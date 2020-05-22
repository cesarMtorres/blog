<template>
  <div>
    <form @submit.prevent="editarTweet(tweet)" v-if="modoEditar">
      <h3>Editar Tweet</h3>
      <textarea type="text" class="form-control mb-2" 
        placeholder="Descripción del tweet" v-model="tweet.content">
          
        </textarea>
      <button class="btn btn-warning" type="submit">Editar</button>
      <button class="btn btn-danger" type="submit" 
        @click="cancelarEdicion">Cancelar</button>
    </form>
    <form @submit.prevent="agregar" v-else>
      <h3>Agregar Tweet</h3>
      <input type="text" class="form-control mb-2" 
        placeholder="Contenido del tweet" v-model="tweet.content">
      <button class="btn btn-primary" type="submit">Enviar</button>
    </form>
    <hr>
    <h3>Lista de tweet:</h3>
    <ul class="list-group">
         <li class="list-group-item" 
            v-for="(item, index) in tweets" :key="index" >
            <span class="badge badge-primary float-left">
              @
              {{item.user.username}}
            </span>
          <span class="badge badge-primary float-right">
            {{item.updated_at}}
          </span>
          <p>{{item.content}}</p>
          <p>
            <button class="btn btn-warning btn-sm" 
                @click="editarFormulario(item)">Editar</button>
            <button class="btn btn-danger btn-sm" 
                @click="eliminarTweet(item, index)">Eliminar</button>
          </p>
        </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tweets: [],
      modoEditar: false,
      tweet: {content: ''}
    }
  },
  created(){
    axios.get('/entries').then(res=>{
      this.tweets = res.data;
    })
  },
  methods:{
    agregar(){
      if(this.tweet.content.trim() === ''){
        alert('Debes completar el campo content');
        return;
      }
      const NuevoTweet = this.tweet;
      this.tweet = {content: ''};    
      axios.post('/entries', NuevoTweet)
        .then((res) =>{
          const tweetServidor = res.data;
          this.tweets.push(tweetServidor);
        })
    },
    editarFormulario(item){
      this.tweet.content = item.content;
      this.tweet.id = item.id;
      this.modoEditar = true;
    },
    editarTweet(tweet){
      const params = {content: tweet.content};
      axios.put(`/entries/${tweet.id}`, params)
        .then(res=>{
          this.modoEditar = false;
          const index = this.tweets.findIndex(item => item.id === tweet.id);
          this.tweets[index] = res.data;
        })
    },
    eliminarTweet(tweet, index){
      const confirmacion = confirm(`Eliminar tweet ${tweet.content}`);
      if(confirmacion){
        axios.delete(`/entries/${tweet.id}`)
          .then(()=>{
            this.tweets.splice(index, 1);
          })
      }
    },
    cancelarEdicion(){
      this.modoEditar = false;
      this.tweet = {content: ''};
    }
  }
}
</script>

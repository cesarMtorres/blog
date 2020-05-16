<template>
    <div class="panel panel-default">
        <div class="panel-heading">Publicado en {{ tweet.created_at }} - Última actualización: {{ tweet.updated_at }}</div>

        <div class="panel-body">

            <input v-if="editMode" type="text" class="form-control" v-model="tweet.content">
            <p v-else>{{ tweet.content }}</p>

        </div>

        <div class="panel-footer">
            <button v-if="editMode" class="btn btn-success" v-on:click="onClickUpdate()">
                Guardar cambios
            </button>
            <button v-else class="btn btn-default" v-on:click="onClickEdit()">
                Editar
            </button>

            <button class="btn btn-danger" v-on:click="onClickDelete()">
                Eliminar
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['tweet'],
        data() {
            return {
                editMode: false
            };
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            onClickDelete() {
                axios.delete('/entries/${this.tweet.id}').then(() => {
                    this.$emit('delete');
                });
            },
            onClickEdit() {
                this.editMode = true;
            },
            onClickUpdate() {
                const params = {
                    content: this.tweet.content
                };
                axios.put('/entries/${this.tweet.id}', params).then((response) => {
                    this.editMode = false;
                    const tweet = response.data;
                    this.$emit('update', tweet);
                });
            }
        }
    }
</script>

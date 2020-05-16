<template>
    <div class="card">
        <div class="card-header">Tweet</div>

        <div class="card-body">
            <form action="" v-on:submit.prevent="newThought()">
                <div class="form-group">
          <textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content" required v-model="content"></textarea>
                            
                        </div>
                <button type="submit" class="btn btn-primary">
                    Enviar Tweet
                </button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                content: ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            newThought() {
                const params = {
                    content: this.content
                };
                this.content = '';

                axios.post('/entries', params)
                    .then((response) => {
                        const tweet = response.data;
                        this.$emit('new', tweet);
                    });

            }
        }
    }
</script>

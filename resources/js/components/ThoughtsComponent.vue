<template>
    <div class="card">
        <div class="col-md-8 col-md-offset-2">

            <form-component @new="addThought"></form-component>

            <thought-component
                v-for="(tweet, index) in entries"
                :key="tweet.id"
                :tweet="tweet"
                @update="updateThought(index,content)"
                @delete="deleteThought(index)">
            </thought-component>

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tweets: []
            }
        },

        mounted() {
            axios.get('/entries').then((response) => {
                this.tweets = response.data;
            });
        },

        methods: {
            addThought(thought) {
                this.thoughts.push(thought);
            },
            updateThought(index, thought) {
                this.thoughts[index] = thought;
            },
            deleteThought(index) {
                this.thoughts.splice(index, 1);
            }
        }
    }
</script>

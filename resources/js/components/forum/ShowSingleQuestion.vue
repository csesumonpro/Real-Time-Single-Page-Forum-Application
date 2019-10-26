<template>
    <v-card>
        <v-container>
            <v-card-title primary-title>
                <div>
                    <h3 class="headline mb-0"> {{question.title}}</h3>
                    <div>
                        <div class="grey--text">
                            {{question.user}} Said  {{question.created_at}}
                        </div>
                    </div>
                </div>
                <v-spacer></v-spacer>
                <v-btn color="teal">49 Replies</v-btn>
            </v-card-title>

            <v-card-text v-html="question.body"> </v-card-text>
        </v-container>
    </v-card>
</template>
<script>
    export default {
        name: "ShowSingleQuestion",
        props:['question']
    }
</script>

<style scoped>

</style>

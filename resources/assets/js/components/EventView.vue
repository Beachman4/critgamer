<template>
    12312312312312313123
    1231231231231312313123123123
</template>


<script>
    export default {
        data() {
            return {
                event: []
            }
        },
        created() {
            this.fetchEvent();
        },
        methods: {
            fetchEvent: function() {
                var id = this.$route.params.event_id;
                this.$http.get('/api/events/'+id).then(function(response) {
                    this.$set('event', response.json().data);
                });
            }
        }
    }
</script>
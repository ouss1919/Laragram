<template>
    <div>
        <button
            action="#"
            @click="followUser"
            v-text="buttonText"
            v-bind:class="status ? 'btn btn-outline-primary btn-sm mr-5' : 'btn btn-primary btn-sm mr-5'"
        >
        </button>
    </div>
</template>

<script>
export default {
props: ['user_id', 'follows'],

    mounted() {
        console.log("Component mounted.");
    },
    data: function () {
        return{ status : this.follows,}
        },

    methods: {
    followUser() {
        axios.post('/follow/'+this.user_id).then(response =>{
            this.status = !this.status;
            }).catch(errors => {
                if (errors.response.status == 401){
                    window.location = '/login';}
        });
        }
    },
    computed: {
        buttonText(){
            return(this.status) ? 'Unfollow' : 'Follow';
        },
    }
};
</script>

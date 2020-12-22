<template>
    <div>
        <div v-if="secrets.length" class="row">
            <div class="secret" v-for="(secret, index) in secrets" :key="index">
                <strong v-text="secret.secret"></strong> - created at <span v-text="secret.created_at"></span>
            </div>
        </div>
    </div>
</template>
<script>
	export default {
		props : ['title','message','error'],
		data() {
			return {
				secrets: [],
				formData: {
					email: '',
					password: ''
				}
			}
		},
	}
</script>
<style scoped>

</style>
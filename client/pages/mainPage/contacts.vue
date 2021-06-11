<template>
	<div class="contacts">
        <div class="contacts__head">
	       	<div class="contacts__head_buttons">
				<router-link 
					class="contacts__btn btn"
					:to="`/contacts/groups`"
				> 
					Гурухлар
				</router-link>
				<router-link 
					class="btn" 
					:to="`/contacts/all`"
				> 
					Барчаси
				</router-link>
	       	</div>
	       	<b-input-group size="sm" class="contacts__tables_search">
				<b-form-input
					id="filter-input"
					v-model="moderatorsFilter"
					type="text"
					placeholder="Type to Search"
				></b-form-input>

				<b-input-group-append>
					<b-button @click="moderatorsFilter = ''">Излаш</b-button>
				</b-input-group-append>
			</b-input-group>
		</div>  
		<nuxt-child />
	</div>
</template>

<script>
	export default {
		fetch({ redirect, route }) { 
        	console.log(route.path)
	        if ( route.path == '/contacts/' || route.path == '/contacts' ) { 
	            redirect('/contacts/groups') 
	        } 
	    },
		data() {
			return {
				moderatorsFilter: ''
			}
		}
	}
</script>
<template>
	<div class="custom-modal">
		<div class="modal__view">
			<div class="modal__head flex">
				<div 
					class="modal__box"
				>
					<div class="modal__head flex">
						<h3 class="modal__title">{{title}}</h3>
				    	<button 
				    		class="modal__erase" 
				    		@click="closeModal()"
				    	>
							<div 
								class="modal__close-icon"
							>
								<img 
									src="@/assets/images/svg/deleteItem.svg" 
									alt="close"
									@click="closeModal()"
								>
							</div>
						</button>
				    </div>
					<slot></slot>
				</div>
		    </div>
		</div>
	</div>
</template>

<script>
	export default {
		props: {
			title: {
				type: String,
				default: 'Title'
			} 
		},
		methods: {
			closeModal() {
				this.$emit('closeModal');
			}
		}
	}
</script>
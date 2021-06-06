<template>
	<div>
		<div class="contacts__cards_quantity">
			<button 
				class="btn router-link-active"
				@click="groupModal = !groupModal"
			> 
				Гурухлар
			</button>
		</div>
		<div class="contacts__groups">
			<div 
				class="contacts__group"
				v-for="(item, index) in org"
				:key="index"
			>
				<div class="contacts__group_head">
					<h2 class="contacts__group_name">
						{{item.name}}
					</h2>
					<div class="contacts__count">{{item.cards.length}}</div>
					<button class="contacts__more" v-if="item.cards.length > 5">яна</button>
				</div>
				<div class="contacts__cards">
					<div 
						class="contacts__card"
						v-for="card in item.cards"
						:key="card.index"
					>
						<div class="contacts__position">
							<span>{{card.position}}</span>
							<div class="contacts__icon">
								<img src="@/assets/images/svg/contactsIcon.svg" alt="user">
							</div>
						</div>
						<div class="contacts__name">{{card.name}}</div>
						<div class="contacts__phone">
							Бошқарма бошлиғи
							<div class="contacts__numbers">
								<div class="contacts__number">{{card.phone}}</div>
								<div class="contacts__number">{{card.homePh}}</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="contacts__cards_pagination">
			<button class="contacts__pagination_btn btn">
				<div class="pagination_left">
					<img src="@/assets/images/svg/right.svg" alt="next">
				</div>
			</button>
			<button class="contacts__pagination_btn btn">
				1
			</button>
			<button class="contacts__pagination_btn btn">
				2
			</button>
			<button class="contacts__pagination_btn btn">
				3
			</button>
			<button class="contacts__pagination_btn btn">
				4   
			</button>
			<button class="contacts__pagination_btn btn">
				<div class="pagination_right">
					<img src="@/assets/images/svg/right.svg" alt="next">
				</div>
			</button>
		</div>
		<div 
			class="custom-modal" 
			:active="`${groupModal}`"
		 >
			<div 
				class="modal__view"
				:active="`${groupModal}`"
			>
				<div 
					class="modal__box"
					:active="`${groupModal}`"
				>
					<div class="task-modal__head flex">
						<h3 class="task-modal__title">Контактларни гурухлаш</h3>
				    	<button 
				    		class="task-modal__erase" 
				    		@click="groupModal = !groupModal"
				    	>
							<div 
								class="task-modal__erase-icon"
								@click="groupModal = !groupModal"
							>
								<img 
									src="@/assets/images/svg/deleteItem.svg" 
									alt="close"
									@click="groupModal = !groupModal"
								>
							</div>
						</button>
				    </div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				groupModal: false,
				moderatorsFilter: '',
				org: [
					{
						name: 'Вилоят ҳокимлиги',
						cards: [
							{
								name: 'Вахобов Алишер Мустафқулович',
								position: 'Ўзбекистон Республикаси Марказий банкининг Фарғона вилоят Бош бошқармаси',
								phone: '+998 97 233 34 34',
								homePh: '+998 73 244 34 34'
							},
							{
								name: 'Вахобов Алишер Мустафқулович',
								position: 'Ўзбекистон Республикаси Марказий банкининг Фарғона вилоят Бош бошқармаси',
								phone: '+998 97 233 34 34',
								homePh: '+998 73 244 34 34'
							},
							{
								name: 'Вахобов Алишер Мустафқулович',
								position: 'Ўзбекистон Республикаси Марказий банкининг Фарғона вилоят Бош бошқармаси',
								phone: '+998 97 233 34 34',
								homePh: '+998 73 244 34 34'
							},
							{
								name: 'Вахобов Алишер Мустафқулович',
								position: 'Ўзбекистон Республикаси Марказий банкининг Фарғона вилоят Бош бошқармаси',
								phone: '+998 97 233 34 34',
								homePh: '+998 73 244 34 34'
							},
							{
								name: 'Вахобов Алишер Мустафқулович',
								position: 'Ўзбекистон Республикаси Марказий банкининг Фарғона вилоят Бош бошқармаси',
								phone: '+998 97 233 34 34',
								homePh: '+998 73 244 34 34'
							}
						]
					},
					{
						name: 'Вилоят ҳокимлиги',
						cards: [
							{
								name: 'Вахобов Алишер Мустафқулович',
								position: 'Ўзбекистон Республикаси Марказий банкининг Фарғона вилоят Бош бошқармаси',
								phone: '+998 97 233 34 34',
								homePh: '+998 73 244 34 34'
							},
							{
								name: 'Вахобов Алишер Мустафқулович',
								position: 'Ўзбекистон Республикаси Марказий банкининг Фарғона вилоят Бош бошқармаси',
								phone: '+998 97 233 34 34',
								homePh: '+998 73 244 34 34'
							},
							{
								name: 'Вахобов Алишер Мустафқулович',
								position: 'Ўзбекистон Республикаси Марказий банкининг Фарғона вилоят Бош бошқармаси',
								phone: '+998 97 233 34 34',
								homePh: '+998 73 244 34 34'
							},
							{
								name: 'Вахобов Алишер Мустафқулович',
								position: 'Ўзбекистон Республикаси Марказий банкининг Фарғона вилоят Бош бошқармаси',
								phone: '+998 97 233 34 34',
								homePh: '+998 73 244 34 34'
							},
							{
								name: 'Вахобов Алишер Мустафқулович',
								position: 'Ўзбекистон Республикаси Марказий банкининг Фарғона вилоят Бош бошқармаси',
								phone: '+998 97 233 34 34',
								homePh: '+998 73 244 34 34'
							}
						]
					},
					{
						name: 'Вилоят ҳокимлиги',
						cards: [
							{
								name: 'Вахобов Алишер Мустафқулович',
								position: 'Ўзбекистон Республикаси Марказий банкининг Фарғона вилоят Бош бошқармаси',
								phone: '+998 97 233 34 34',
								homePh: '+998 73 244 34 34'
							},
							{
								name: 'Вахобов Алишер Мустафқулович',
								position: 'Ўзбекистон Республикаси Марказий банкининг Фарғона вилоят Бош бошқармаси',
								phone: '+998 97 233 34 34',
								homePh: '+998 73 244 34 34'
							},
							{
								name: 'Вахобов Алишер Мустафқулович',
								position: 'Ўзбекистон Республикаси Марказий банкининг Фарғона вилоят Бош бошқармаси',
								phone: '+998 97 233 34 34',
								homePh: '+998 73 244 34 34'
							},
							{
								name: 'Вахобов Алишер Мустафқулович',
								position: 'Ўзбекистон Республикаси Марказий банкининг Фарғона вилоят Бош бошқармаси',
								phone: '+998 97 233 34 34',
								homePh: '+998 73 244 34 34'
							},
							{
								name: 'Вахобов Алишер Мустафқулович',
								position: 'Ўзбекистон Республикаси Марказий банкининг Фарғона вилоят Бош бошқармаси',
								phone: '+998 97 233 34 34',
								homePh: '+998 73 244 34 34'
							}
						]
					}
				]
			}
		}
	}
</script>
<template>
	<div class="notifications">
		<div class="notifications__control">
			<button class="btn" @click="natificationsModal = true">
				<div class="btn_icon">
					<img src="@/assets/images/svg/plus.svg" alt="add">
				</div>
				Яратиш
			</button>	
			<div class="notificaitons__filters">
				         
			</div>
		</div>		
		<div class="notifications__content">
			<div class="notifications__tabs">
				<b-tabs card>
				 	<b-tab active>
						<template #title>
							<span class="notifications__tab_name">Янги </span>
							<span class="notifications__tab_count">{{processUnits.length}} та</span>
						</template>
						<div class="notifications__tab_content">
							<div 
								class="assignments__units"
								v-for="unit in processUnits"
								:key="unit.index"
							>
								<div class="assignments__units_date">
									{{unit.date}}
								</div>
								<router-link 
									class="assignments__card"
									v-for="card in unit.cards"
									:key="card.index"
									:to="`/notifications/${card.id}`"
								>
									<div class="assignments__card_content">
										<div class="assignments__card_top">
											<div class="assignments__card_time">{{card.time}}</div>
											<div class="assignments__card_number">
												Топшириқ № {{card.number}}
											</div>
										</div>
										<h3 class="assignments__card_name">
											* {{card.name}}
										</h3>
										<div class="assignments__car_line"></div>
										<p class="assignments__card_text">
											{{card.text}}
										</p>
									</div>
									<div class="assignments__card_footer">
										<button class="assignments__file_btn">
											<div class="assignments__file_icon">
												<img src="@/assets/images/svg/clip.svg" alt="clip">
											</div>
											<div class="assignments__file_text">
												илова
											</div>
										</button>
										<div class="assignments__progress">
											<div class="assignments__progress_count" style="width: 100%">
												100%
											</div>
										</div>     
										<div class="assignments__card_count">7/14</div>
									</div>
								</router-link>
							</div>
						</div>
					</b-tab>
					<b-tab>
						<template #title>
							<span class="notifications__tab_name">Архив </span>
							<span class="notifications__tab_count">{{processUnits.length}} та</span>
						</template>
						<div class="notifications__tab_content">
							<div 
								class="assignments__units"
								v-for="unit in processUnits"
								:key="unit.index"
							>
								<div class="assignments__units_date">
									{{unit.date}}
								</div>
								<router-link 
									class="assignments__card"
									v-for="card in unit.cards"
									:key="card.index"
									:to="`/notifications/${card.id}`"
								>
									<div class="assignments__card_content">
										<div class="assignments__card_top">
											<div class="assignments__card_time">{{card.time}}</div>
											<div class="assignments__card_number">
												Топшириқ № {{card.number}}
											</div>
										</div>
										<h3 class="assignments__card_name">
											* {{card.name}}
										</h3>
										<div class="assignments__car_line"></div>
										<p class="assignments__card_text">
											{{card.text}}
										</p>
									</div>
									<div class="assignments__card_footer">
										<button class="assignments__file_btn">
											<div class="assignments__file_icon">
												<img src="@/assets/images/svg/clip.svg" alt="clip">
											</div>
											<div class="assignments__file_text">
												илова
											</div>
										</button>
										<div class="assignments__progress">
											<div class="assignments__progress_count" style="width: 100%">
												100%
											</div>
										</div>     
										<div class="assignments__card_count">7/14</div>
									</div>
								</router-link >
							</div>
						</div>
					</b-tab>
			    </b-tabs>
			</div>	
			<div class="notifications__data">
				<nuxt-child />
				<!-- <div
					v-else
				>
					выберете карточку!
				</div> -->
			</div>
		</div>
		<pModal 
			title="Хабарнома яратиш"
			@closeModal="natificationsModal = false"
			v-if="natificationsModal"
		 >
			<div class="task-modal__inputs">
				<input 
					type="text" 
					placeholder="Хабарнома яратиш" 
					class="task-modal__name"
				>
			</div>
			<div class="task-modal__box flex">
				<div class="task-modal__editor">
					<h3 class="task-modal__title">Топшириқ матни</h3>
					<div class="task-modal__text-field">
						<textarea name="1230" id="1230" rows="10"></textarea>
					</div>
					<div 
						class="file"
						@click="chooseFile"
					>
						<input 
							type="file" 
							class="file__input"
							ref="fileInput"
							@change="onSelectFile"
						>
						<span class="file__text">
							<div class="file__icon">
								<img src="@/assets/images/svg/clip.svg" alt="slag">
							</div>
							Файл бириктириш
						</span>
					</div>
					<ul>
						<li 
							class="selectedFile"
							v-for="(file, index) in chooseFiles"
							:key="index"
						>
							<span>{{file.name}}</span>
							<button class="delFile">
								<div @click="delFile(index)" class="delFile-icon">
									<img src="@/assets/images/svg/deleteItem.svg" alt="delete">
								</div>
							</button>
						</li>
					</ul>
				</div>
				<div class="task-modal__data">
					<div>
						<div class="task-modal__search">
 							<input 
								type="text" 
								class="task-modal__search-input"
								placeholder="Излаш" 
							>
							<button class="task-modal__erase">
								<div class="task-modal__erase-icon">
									<img src="@/assets/images/svg/deleteItem.svg" alt="delete">
								</div>
							</button>
						</div>
						<div class="group__table">
							<ul class="group__job"> 
								<li 
									class="group__job-field"
									v-for="job in jobs"
									:key="job.index"
								>
									<div 
										class="group__job-item flex"
										@click.self="job.is_active = !job.is_active"
										:active="job.is_active.toString()"
									>
										<div class="group__job-box">
											<span class="group__job-name">{{job.name}}</span>
											<span class="group__job-count">{{job.users.length}}</span>
										</div>
										<div 
											class="group__job-button"
											:active="job.open"
											@click.stop="job.open = !job.open;"
										>
											<span v-if="job.open">-</span>
											<span v-else="job.open">+</span>
										</div>

									</div>
									<ul class="group__users" :active="job.open.toString()">
										<li 
											class="group__users-item"
											v-for="user in job.users"
											:key="user.index"
										>
											<div class="group__users-line"></div>
											<div 
												class="group__users-text"
												@click.self="user.is_active = !user.is_active"
												:active="user.is_active.toString()"
											>{{user.name}}</div>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
					<div class="moderators_modal__footer_buttons">
						<button class="moderators_modal__footer__button">Тозалаш</button>
						<button class="moderators_modal__footer__button active">Сақлаш</button>
					</div>
				</div>
			</div>
		</pModal>
	</div>
</template>

<script>
	import pModal from '@/components/pModal'
	export default {
		components: {
			pModal
		},
		data() {
			return {
				natificationsModal: false,
				chooseFiles: [],
				file: [],
				id: '', 
				processUnits: [
					{
						date: "2021 й 20 апрел",
						cards: [
							{
								number: "5",
								id: 5,
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							},
							{
								number: "5",
								id: 6,
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							},
							{
								number: "5",
								id: 7,
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							}
						]
					},
					{
						date: "2021 й 20 апрел",
						cards: [
							{
								number: "5",
								id: 8,
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							},
							{
								number: "5",
								id: 9,
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							},
							{
								number: "5",
								id: 10,
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							}
						]
					},
					{
						date: "2021 й 20 апрел",
						cards: [
							{
								number: "5",
								id: 11,
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							},
							{
								number: "5",
								id: 12,
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							},
							{
								number: "5",
								id: 13,
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							}
						]
					},
					{
						date: "2021 й 20 апрел",
						cards: [
							{
								number: "5",
								id: 14,
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							},
							{
								number: "5",
								id: 5,
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							},
							{
								number: "5",
								id: 5,
								time: "18:10",
								last: "2 кун",
								name: "Аппарат йиғилишида баёни",
								text: "Бир ҳафта муддатда 7-сонли ташриф баёнинига асосан қабул қилиниши белгиланган қарор лойиҳаларининг ........"
							}
						]
					}
				],
				jobs: [
					{
						name: 'xzczxczxcz',
						open: false,
						is_active: false,
						users: [
							{
								name: 'asdasdasd',
								is_active: false
							},
							{
								name: 'asdasdasd',
								is_active: false
							},
							{
								name: 'asdasdasd',
								is_active: false
							},
							{
								name: 'asdasdasd',
								is_active: false
							},
							{
								name: 'asdasdasd',
								is_active: false
							}
						]
					},
					{
						name: 'xzczxczxcz',
						open: false,
						is_active: false,
						users: [
							{
								name: 'asdasdasd',
								is_active: false
							},
							{
								name: 'asdasdasd',
								is_active: false
							},
							{
								name: 'asdasdasd',
								is_active: false
							},
							{
								name: 'asdasdasd',
								is_active: false
							},
							{
								name: 'asdasdasd',
								is_active: false
							}
						]
					},
					{
						name: 'xzczxczxcz',
						open: false,
						is_active: false,
						users: [
							{
								name: 'asdasdasd',
								is_active: false
							},
							{
								name: 'asdasdasd',
								is_active: false
							},
							{
								name: 'asdasdasd',
								is_active: false
							},
							{
								name: 'asdasdasd',
								is_active: false
							},
							{
								name: 'asdasdasd',
								is_active: false
							}
						]
					}
				]
			}
		},
		methods: {
			chooseFile () {
                this.$refs.fileInput.click();
            },
            onSelectFile () {
                const input = this.$refs.fileInput;
                const files = input.files;

                if (files && files[0]) {
                    this.chooseFiles.push(files[0]);

                    const reader = new FileReader;
                    reader.readAsDataURL(files[0]);
                    this.$emit('input', files[0]);
                }
            },

            delFile(index) {
            	this.chooseFiles.splice(index, 1);
            },
            editTask() {
            	console.log('clik')
            },
            getFiles() {
            	console.log('clik')
            }
		}
	}
</script>
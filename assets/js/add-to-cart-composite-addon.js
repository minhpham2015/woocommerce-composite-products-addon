;( function ( $, window, document, Backbone, undefined ) {

	$( '.composite_data' ).on( 'wc-composite-initializing', function( event, composite ) {

		function Composite_Addon_App() {

			/**
			 * Track changes to 'Composite Info' scenarios.
			 */
			var Composite_Info_Model = function( opts ) {


				var Model = Backbone.Model.extend( {

					initialize: function( options ) {

						var params = {
							t_energy: 0,
							t_protein: 0,
							t_fat_total: 0,
							t_fat_sat : 0,
							t_cards : 0,
							list_products_selected : []
						}

						this.set(params);

						//Change product
						composite.actions.add_action( 'component_selection_content_changed', this.selection_content_changed_handler, 20, this );

					},

					selection_content_changed_handler: function (step){

						if ( composite.is_initialized ) {

							var $component_data = step.$component_content.find('.component_data'),

									list_selected = [];

									$component_data.find('.bundled_product').each(function(i){
										var checkbox_card = $(this).find('.bundled_product_checkbox')
										var product_id = $(this).find('.cart').data('product_id');

										if(checkbox_card.is(':checked')){

											list_selected.push(product_id);

										}

									});

							console.log(list_selected);

						}

					}

				} );

				var obj = new Model( opts );
				return obj;
			};

			//Render
			var Composite_Info_View = function( opts ) {

				var ModelView = Backbone.View.extend({

					el: '#composite-nutritional-info',

					initialize: function(options) {
						this.render();
						this.listenTo( this.model, 'change:t_energy', this.render );
						this.listenTo( this.model, 'change:t_protein', this.render );
						this.listenTo( this.model, 'change:t_fat_total', this.render );
						this.listenTo( this.model, 'change:t_fat_sat', this.render );
						this.listenTo( this.model, 'change:t_cards', this.render );
					},

					render: function() {

						$t_energy 		= this.model.get( 't_energy' );
						$t_protein 		= this.model.get( 't_protein' );
						$t_fat_total 	= this.model.get( 't_fat_total' );
						$t_fat_sat 		= this.model.get( 't_fat_sat' );
						$t_cards 			= this.model.get( 't_cards' );

						this.$el.find('.comp-energy').html($t_energy);
						this.$el.find('.comp-protein').html($t_protein);
						this.$el.find('.comp-fat-total').html($t_fat_total);
						this.$el.find('.comp-fat-sat').html($t_fat_sat);
						this.$el.find('.comp-cards').html($t_cards);

						return this;
					}

				});

				var obj = new ModelView( opts );
				return obj;
			};

			/**
			 * Initialize app.
			 */
			this.initialize = function() {

				var $composite_addon_step = $( '.composite_addon_step_template' ).first();
				if ( $composite_addon_step.length > 0 ) {
					this.model = new Composite_Info_Model();
					this.view = new Composite_Info_View( { model: this.model, el: $composite_addon_step } );
				}

			};
		}

		var app = new Composite_Addon_App();

		app.initialize();

	} );

} ) ( jQuery, window, document, Backbone );

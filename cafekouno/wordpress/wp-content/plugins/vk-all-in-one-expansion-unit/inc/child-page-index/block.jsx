(function(wp){
	const { __ } = wp.i18n
	const { registerBlockType } = wp.blocks
	const { InspectorControls } = wp.blockEditor && wp.blockEditor.BlockEdit ? wp.blockEditor : wp.editor
	const { ServerSideRender, PanelBody, SelectControl } = wp.components
	const { withSelect, select } = wp.data
	const { Fragment } = wp.element
	const React = wp.element
	const BlockIcon = (
		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M10.8895 14.7778L7.62346 14.7854C7.57942 14.7854 7.53538 14.8158 7.5207 14.8614L7.27116 15.5832C7.24915 15.6592 7.30052 15.7352 7.37392 15.7352H8.64364C8.73905 15.7352 8.79043 15.8567 8.72437 15.9251L6.69869 18.1058H6.70603L7.74823 21.5021C7.77025 21.578 7.71887 21.6464 7.64548 21.6464H6.62529C6.57392 21.6464 6.53722 21.616 6.52254 21.5704L6.00144 19.8305C5.97208 19.7241 5.83264 19.7241 5.79594 19.8229L5.37025 21.0462C5.36291 21.069 5.36291 21.0918 5.37025 21.1146L5.75924 22.5962C5.77392 22.6418 5.81796 22.6797 5.86199 22.6797H9.15006C9.22345 22.6797 9.27483 22.6038 9.25281 22.5354L7.92437 18.2577C7.90969 18.2197 7.92437 18.1741 7.95373 18.1437L10.9702 14.9678C11.0363 14.8994 10.9849 14.7778 10.8895 14.7778Z" fill="black"/>
		<path d="M7.02164 13L5.03265 13.0076C4.98862 13.0076 4.94458 13.038 4.9299 13.0836L4.67302 13.8054C4.64366 13.8814 4.70238 13.9573 4.77577 13.9573H5.61247C5.68586 13.9573 5.73724 14.0333 5.71522 14.1093L3.34458 20.8259C3.30789 20.9247 3.17578 20.9247 3.13908 20.8259L1.43633 15.9784C1.40697 15.9024 1.46569 15.8265 1.53908 15.8265H2.3978C2.44183 15.8265 2.48587 15.8568 2.50055 15.9024L3.11706 17.65C3.15376 17.7487 3.28587 17.7487 3.32257 17.65L4.27669 14.9299C4.30605 14.8539 4.24733 14.7779 4.17394 14.7779H0.107895C0.0345005 14.7779 -0.0168755 14.8539 0.0051428 14.9299L3.13174 23.9259C3.16844 24.0247 3.30055 24.0247 3.33724 23.9259L7.12439 13.152C7.14641 13.076 7.09503 13 7.02164 13Z" fill="#D8141C"/>
		<path fill-rule="evenodd" clip-rule="evenodd" d="M1.5 6.5V1.5H9.5V6.5H1.5ZM0 1C0 0.447715 0.447715 0 1 0H10C10.5523 0 11 0.447715 11 1V7C11 7.55228 10.5523 8 10 8H1C0.447715 8 0 7.55228 0 7V1ZM1.5 13.2779V11.5H7.02166H9.5V13.2812L10.8895 13.2779C10.9268 13.2779 10.9637 13.2791 11 13.2814V11C11 10.4477 10.5523 10 10 10H1C0.447715 10 0 10.4477 0 11V13.281C0.0353798 13.279 0.0713537 13.2779 0.107918 13.2779H1.5ZM3.36751 13L3.2686 13.2779H3V13H3.36751ZM10.1733 17.985C10.6035 17.9099 10.9392 17.5598 10.9926 17.1225L10.1733 17.985ZM14.5 1.5V6.5H22.5V1.5H14.5ZM14 0C13.4477 0 13 0.447715 13 1V7C13 7.55228 13.4477 8 14 8H23C23.5523 8 24 7.55228 24 7V1C24 0.447715 23.5523 0 23 0H14ZM14.5 16.5V11.5H22.5V16.5H14.5ZM13 11C13 10.4477 13.4477 10 14 10H23C23.5523 10 24 10.4477 24 11V17C24 17.5523 23.5523 18 23 18H14C13.4477 18 13 17.5523 13 17V11ZM3 3V5H5V3H3ZM16 3V5H18V3H16ZM16 15V13H18V15H16Z" fill="black"/>
		</svg>
	);

	registerBlockType("vk-blocks/child-page-index", {
		title: __("Child page index", "veu-block"),
		icon: BlockIcon,
		category: "veu-block",
		attributes: {
			postId: {
				type: 'number',
				default: -1
			}
		},
		edit: withSelect(( select) => {
			return {
				pages: select('core').getEntityRecords('postType', 'page', {
					_embed: true,
					per_page: -1
				})
			}
		})(( props )=>{
			const { attributes, setAttributes, pages } = props;
			const { postId, className } = attributes;

			// Make choice list of pages
			let options = [ { label: __( "This Page", "veu-block" ), value: -1 } ]

			// Make choice list of pages
			if ( pages !== undefined && pages !== null ) {
				const l = pages.length
				const parents = []
				let i = 0
				for(i=0;i<l;i++) {
					if ( pages[i].parent !== 0 ) {
						parents.push(pages[i].parent)
					}
				}
				for(i=0; i < l;i++) {
					if ( parents.includes(pages[i].id) ) {
						options.push({
							label: pages[i].title.rendered,
							value: pages[i].id
						})
					}
				}
			}

			// Remove choice of the page
			/*
			const currentPostId = select("core/editor").getCurrentPostId();
			if(currentPostId){
				options = options.filter(option => option.value !== currentPostId)
			}
			*/
			
			return (
				<Fragment>
					<InspectorControls>
						<PanelBody
							label={ __( "Parent Page", "veu-block" ) }
						>
							<SelectControl
								label={ __( 'Parent Page', 'veu-block' ) }
								value={ postId }
								options={ options }
								onChange={ ( value )=>{ setAttributes({ postId: parseInt(value, 10) }) } }
							/>
						</PanelBody>
					</InspectorControls>
					<div className='veu_child_page_list_block'>
						<ServerSideRender
							block="vk-blocks/child-page-index"
							attributes={attributes}
						/>
					</div>
				</Fragment>
			)
		}),
		save: () => null
	});
})(wp);

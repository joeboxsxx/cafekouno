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
		<path d="M12.3895 14.778L9.12346 14.7856C9.07942 14.7856 9.03538 14.8159 9.0207 14.8615L8.77116 15.5833C8.74915 15.6593 8.80052 15.7353 8.87392 15.7353H10.1436C10.2391 15.7353 10.2904 15.8569 10.2244 15.9253L8.19869 18.1059H8.20603L9.24823 21.5022C9.27025 21.5782 9.21887 21.6465 9.14548 21.6465H8.12529C8.07392 21.6465 8.03722 21.6162 8.02254 21.5706L7.50144 19.8306C7.47208 19.7242 7.33264 19.7242 7.29594 19.823L6.87025 21.0463C6.86291 21.0691 6.86291 21.0919 6.87025 21.1147L7.25924 22.5963C7.27392 22.6419 7.31796 22.6799 7.36199 22.6799H10.6501C10.7235 22.6799 10.7748 22.6039 10.7528 22.5355L9.42437 18.2578C9.40969 18.2198 9.42437 18.1743 9.45373 18.1439L12.4702 14.9679C12.5363 14.8995 12.4849 14.778 12.3895 14.778Z" fill="black"/>
		<path d="M8.52164 13L6.53265 13.0076C6.48862 13.0076 6.44458 13.038 6.4299 13.0836L6.17302 13.8054C6.14366 13.8814 6.20238 13.9573 6.27577 13.9573H7.11247C7.18586 13.9573 7.23724 14.0333 7.21522 14.1093L4.84458 20.8259C4.80789 20.9247 4.67578 20.9247 4.63908 20.8259L2.93633 15.9784C2.90697 15.9024 2.96569 15.8265 3.03908 15.8265H3.8978C3.94183 15.8265 3.98587 15.8568 4.00055 15.9024L4.61706 17.65C4.65376 17.7487 4.78587 17.7487 4.82257 17.65L5.77669 14.9299C5.80605 14.8539 5.74733 14.7779 5.67394 14.7779H1.60789C1.5345 14.7779 1.48312 14.8539 1.50514 14.9299L4.63174 23.9259C4.66844 24.0247 4.80055 24.0247 4.83724 23.9259L8.62439 13.152C8.64641 13.076 8.59503 13 8.52164 13Z" fill="#D8141C"/>
		<path fill-rule="evenodd" clip-rule="evenodd" d="M5.5 6H19.5C19.7761 6 20 6.22386 20 6.5V12.9218L18.6112 11.6869C17.4394 10.644 15.75 11.5771 15.75 13.0107V14H13.7319C14.0152 14.4333 14.0929 14.9963 13.8856 15.5H15.75V19.9889C15.75 21.5247 17.6676 22.4313 18.773 21.1492L20.3235 19.3504L22.5941 19.2559C24.2232 19.1881 24.7797 17.1733 23.659 16.1754L21.3895 14.1573C21.4611 13.9514 21.5 13.7303 21.5 13.5V6.5C21.5 5.39543 20.6046 4.5 19.5 4.5H5.5C4.39543 4.5 3.5 5.39543 3.5 6.5V13.2779H4.7686L5 12.6277V6.5C5 6.22386 5.22386 6 5.5 6ZM8.5 10.75H16.5V9.25H8.5V10.75ZM17.25 13.0107C17.25 12.8896 17.3127 12.8097 17.3917 12.7717C17.4317 12.7525 17.47 12.7474 17.5017 12.7512C17.5295 12.7545 17.5681 12.7666 17.6145 12.8079L22.6616 17.2957C22.7434 17.3686 22.772 17.4775 22.7337 17.593C22.7152 17.6492 22.6846 17.6901 22.654 17.715C22.6275 17.7365 22.5912 17.7547 22.5317 17.7572L20.2402 17.8525C19.8361 17.8699 19.46 18.0554 19.1963 18.3607L17.6371 20.1697C17.5902 20.224 17.5501 20.2401 17.5228 20.2461C17.4907 20.2532 17.4497 20.2514 17.4055 20.2336C17.3188 20.1989 17.25 20.1188 17.25 19.9889V13.0107Z" fill="black"/>
		</svg>
	);

	registerBlockType("vk-blocks/cta", {
		title: __("CTA", "veu-block"),
		icon: BlockIcon,
		category: "veu-block",
		attributes: {
			postId: {
				type: 'string',
				default: ''
			}
		},
		edit: ( props ) => {
			const { attributes, setAttributes } = props;
			const { postId } = attributes;

			// Make choice list of pages
			const options = veuBlockOption.cat_option;
			let setting = '';
			if (
				wp.data.select('core/editor') &&
				wp.data.select('core/editor').getEditedPostAttribute('meta') &&
				wp.data.select('core/editor').getEditedPostAttribute('meta').vkexunit_cta_each_option
			) {
				setting = wp.data.select('core/editor').getEditedPostAttribute('meta').vkexunit_cta_each_option;
			}
			
    
            let editContent;
            if ( setting === 'disable' ) {
				editContent = (
					<div className="veu-cta-block-edit-alert">
						{ __("Because displaying CTA is disabled. The block render no content.", "veu-block") }
					</div>
				);
			} else if ( postId !== '' &&  postId !== null &&  postId !== undefined ) {
				editContent = (
					<ServerSideRender
						block="vk-blocks/cta"
						attributes={attributes}
					/>
				);
			} else {
				editContent = (
					<div className="veu-cta-block-edit-alert alert alert-warning">
						{ __("Please select CTA from Setting sidebar.", "veu-block") }
					</div>
				);
			}
			
			return (
				<Fragment>
					<InspectorControls>
						<PanelBody
							label={ __( "CTA Setting", "veu-block" ) }
						>
							<SelectControl
								label={ __( 'Select CTA', 'veu-block' ) }
								value={ postId }
								options={ options }
								onChange={ ( value )=>{ setAttributes({ postId: value }) } }
							/>
						</PanelBody>
					</InspectorControls>
					<div className='veu-cta-block-edit'>
						{editContent}
					</div>
				</Fragment>
			)
		},
		save: () => null
	});
})(wp);

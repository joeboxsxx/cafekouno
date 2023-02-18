;(function(wp){
  const { __ } = wp.i18n
  const { registerBlockType } = wp.blocks
  const { ServerSideRender, PanelBody } = wp.components
  const { Fragment } = wp.element
  const React = wp.element
  const BlockIcon = (
	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path d="M24,21.5H11l-0.3-1H23V2.4h-21V13h-1V1.4h23V21.5z M5.5,5C6.3,5,7,5.7,7,6.5C7,7.3,6.3,8,5.5,8C4.7,8,4,7.3,4,6.5
		C4,5.7,4.7,5,5.5,5z M20,7H9V6h11V7z M7,11.5C7,10.7,6.3,10,5.5,10C4.7,10,4,10.7,4,11.5c0,0.1,0,0.2,0,0.4c0.3-0.2,0.6-0.3,1-0.3h0
		L7,11.5L7,11.5z M20,17v-1h-7.9c0,0,0,0,0,0l-0.9,1H20z M20,12H9v-1h11V12z" fill="black"/>
	<path d="M10.9,14.8l-3.3,0c0,0-0.1,0-0.1,0.1l-0.2,0.7c0,0.1,0,0.2,0.1,0.2h1.3c0.1,0,0.1,0.1,0.1,0.2l-2,2.2h0l1,3.4
		c0,0.1,0,0.1-0.1,0.1h-1c-0.1,0-0.1,0-0.1-0.1L6,19.8c0-0.1-0.2-0.1-0.2,0L5.4,21c0,0,0,0,0,0.1l0.4,1.5c0,0,0.1,0.1,0.1,0.1h3.3
		c0.1,0,0.1-0.1,0.1-0.1l-1.3-4.3c0,0,0-0.1,0-0.1l3-3.2C11,14.9,11,14.8,10.9,14.8z" fill="black"/>
	<path d="M7.02164 13L5.03265 13.0076C4.98862 13.0076 4.94458 13.038 4.9299 13.0836L4.67302 13.8054C4.64366 13.8814 4.70238 13.9573 4.77577 13.9573H5.61247C5.68586 13.9573 5.73724 14.0333 5.71522 14.1093L3.34458 20.8259C3.30789 20.9247 3.17578 20.9247 3.13908 20.8259L1.43633 15.9784C1.40697 15.9024 1.46569 15.8265 1.53908 15.8265H2.3978C2.44183 15.8265 2.48587 15.8568 2.50055 15.9024L3.11706 17.65C3.15376 17.7487 3.28587 17.7487 3.32257 17.65L4.27669 14.9299C4.30605 14.8539 4.24733 14.7779 4.17394 14.7779H0.107895C0.0345005 14.7779 -0.0168755 14.8539 0.0051428 14.9299L3.13174 23.9259C3.16844 24.0247 3.30055 24.0247 3.33724 23.9259L7.12439 13.152C7.14641 13.076 7.09503 13 7.02164 13Z" fill="#D8141C"/>
	</svg>
  );

  registerBlockType("vk-blocks/page-list-ancestor", {
    title: __("Page list from ancestor", "veu-block"),
    icon: BlockIcon,
    category: "veu-block",
    edit: ({className}) => {
      return (
          <Fragment>
            <div className={`${className} veu_page_list_ancestor_block`} >
              <ServerSideRender
                block="vk-blocks/page-list-ancestor"
                attributes={{className: className}}
              />
            </div>
          </Fragment>
        )
    },
    save: () => null
  })
})(wp);

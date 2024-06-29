import withConditions from './panels/conditions/'

const { addFilter, removeFilter } = wp.hooks;

addFilter( 'editor.BlockEdit', 'wicked-block-conditions/with-conditions', withConditions );

if ( module.hot ) {
    module.hot.accept( './panels/conditions/', () => {
        removeFilter( 'editor.BlockEdit', 'wicked-block-conditions/with-conditions', withConditions );

        addFilter( 'editor.BlockEdit', 'wicked-block-conditions/with-conditions', withConditions );
    } )
}

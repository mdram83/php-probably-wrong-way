wp.blocks.registerBlockType('ppww/ppww-chatgpt-editor-plugin', {
    title: 'ChatGPT Assistant',
    icon: 'smiley',
    category: 'common',
    attributes: {
        messages: {type: 'array'},
    },
    edit: EditComponent,
    save: function() {
        return wp.element.createElement('h3', null, 'ChatGPT Test from Frontend');
    },
});

function EditComponent(props) {
    return <h3>ChatGPT Test from Editor</h3>;
}
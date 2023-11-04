wp.blocks.registerBlockType('ppww/ppww-chatgpt-editor-plugin', {
    title: 'ChatGPT Assistant',
    icon: 'smiley',
    category: 'common',
    attributes: {
        messages: {type: 'array', default: []},
    },
    edit: EditComponent,
    save: function() {
        return wp.element.createElement('h3', null, 'ChatGPT Test from Frontend');
    },
});

function EditComponent(props) {

    function sendQuestion(event) {
        const questionElement = event.target.parentNode.querySelector("input[name='question']");
        const question = questionElement.value.trim();
        if (question === '') {
            return;
        }

        alert('Sending question');
        const answer = {
            'role': 'assistant',
            'content': 'This is an answer to your question: ' + question,
        };
        // TODO add error handling later

        questionElement.value = '';
        updateMessages(question, answer);
    }


    function updateMessages(question, answer) {
        props.setAttributes({messages: props.attributes.messages.concat([
            {
                'role': 'user',
                'content': question,
            },
            answer,
        ])});
    }

    // console.log(props.attributes);

    return (
        <div>
            {props.attributes.messages.map((element) => {
                return <p className={element.role}>{element.content}</p>;
            })}
            <input type="text" name="question" placeholder="Write message you want to send to ChatGPT" />
            <button onClick={sendQuestion}>Send</button>
        </div>
    );
}
import './index.css';
import {TextControl, Button, Flex, FlexBlock, FlexItem} from '@wordpress/components';

// TODO add function to disable post save/update if block has no received answers.

wp.blocks.registerBlockType('ppww/ppww-chatgpt-editor-plugin', {
    title: 'ChatGPT Conversation',
    icon: 'format-status',
    category: 'common',
    attributes: {
        messages: {type: 'array', default: []},
    },
    edit: EditComponent,
    save: function() {
        return null;
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

        // TODO adjust below format to use same format for both question and asnwer and maybe directly what's coming from api call?

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
        <div className="ppww-chatgpt-editor-block">
            {props.attributes.messages.map((element) => {
                return <p className={'ppww-chatgpt-editor-block-message-' + element.role}>{element.content}</p>;
            })}
            <Flex>
                <FlexBlock>
                    <TextControl name="question" label="Next question for ChatGPT" placeholder="Your next question" />
                </FlexBlock>
                <FlexItem>
                    <Button className="ppww-chatgpt-editor-block-button" onClick={sendQuestion}>Send Question</Button>
                </FlexItem>
            </Flex>
        </div>
    );
}
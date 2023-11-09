import './index.css';
import axios from 'axios';
import {TextControl, Button, Flex, FlexBlock, FlexItem} from '@wordpress/components';

wp.blocks.registerBlockType('ppww/ppww-chatgpt-editor-plugin', {
    title: 'ChatGPT Conversation',
    icon: 'format-status',
    category: 'common',
    attributes: {
        messages: {type: 'array', default: []},
    },
    edit: EditComponent,
    save: () => null,
});

function EditComponent(props) {

    function sendQuestion(event) {
        const errorElement = event.target.parentElement.parentElement.parentElement.querySelector(".ppww-chatgpt-editor-block-error-message");
        const questionElement = event.target.parentElement.parentElement.querySelector("input[name='question']");
        const question = questionElement.value.trim();

        if (question === '') {
            questionElement.focus();
            showError(errorElement, 'Please provide the question.');
            return;
        }

        hideElement(errorElement);

        const data = {
            previousMessages: props.attributes.messages,
            nextQuestion: question,
        };

        axios.defaults.headers.common["X-WP-Nonce"] = ppwwChatgptEditorPluginData.nonce;
        axios.post(ppwwChatgptEditorPluginData.rootUrl + '/wp-json/ppww-chatgpt/v1/chat/', data)
            .then(response => {
                questionElement.value = '';
                updateMessages(question, response.data.choices[0].message);
            })
            .catch(error => {
                const errorMessage = 'API CALL ERROR: ' + error.response.data.data ?? 'internal error';
                showError(errorElement, errorMessage);
            });
    }

    function showError(errorElement, errorMessage) {
        errorElement.innerHTML = errorMessage;
        errorElement.style.display = 'block';
    }

    function hideClickedElement(event) {
        hideElement(event.target);
    }

    function hideElement(element) {
        element.style.display = 'none';
    }

    function updateMessages(question, answer) {

        props.setAttributes({messages: props.attributes.messages.concat([
            {
                role: 'user',
                content: question,
            },
            answer,
        ])});
    }

    return (
        <div className="ppww-chatgpt-editor-block">
            {props.attributes.messages.map((element) => {
                return <p className={'ppww-chatgpt-editor-block-message-' + element.role}>{element.content}</p>;
            })}
            <Flex>
                <FlexBlock>
                    <TextControl name="question" label="Next question for ChatGPT" placeholder="Your next question" onChange={() => null}/>
                </FlexBlock>
                <FlexItem>
                    <Button className="ppww-chatgpt-editor-block-button" onClick={sendQuestion}>Send Question</Button>
                </FlexItem>
            </Flex>
            <Flex>
                <FlexBlock>
                    <div onClick={hideClickedElement} className="ppww-chatgpt-editor-block-error-message">Error message here</div>
                </FlexBlock>
            </Flex>
        </div>
    );
}
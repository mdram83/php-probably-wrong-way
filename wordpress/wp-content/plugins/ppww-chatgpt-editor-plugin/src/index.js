import './index.css';
import axios from 'axios';
import {TextControl, Button, Flex, FlexBlock, FlexItem, Spinner} from '@wordpress/components';

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

        const sendButton = event.target;
        const loadingButton = event.target.parentElement.querySelector(".ppww-chatgpt-editor-block-loading-button");

        hideElement(errorElement);
        hideElement(sendButton);
        showElement(loadingButton, 'inline-flex');

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
                const errorMessage = 'API CALL ERROR: ' + error.response.data.data ?? 'unknown error';
                showError(errorElement, errorMessage);
            })
            .then(() => {
                hideElement(loadingButton);
                showElement(sendButton);
            });
    }

    function showError(errorElement, errorMessage) {
        errorElement.innerHTML = errorMessage;
        showElement(errorElement);
    }

    function hideClickedElement(event) {
        hideElement(event.target);
    }

    function hideElement(element) {
        element.style.display = 'none';
    }

    function showElement(element, displayType = 'block') {
        element.style.display = displayType;
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
                    <Button className="ppww-chatgpt-editor-block-loading-button"><Spinner className="ppww-chatgpt-editor-block-spinner" />Loading...&nbsp;</Button>
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
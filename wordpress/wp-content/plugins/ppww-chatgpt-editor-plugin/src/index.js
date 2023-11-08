import './index.css';
import axios from 'axios';
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
    save: () => null,
});

function EditComponent(props) {

    function getQuestionElement() {
        return document.querySelector("input[id='chatgpt-question']"); // TODO change to parent as this will allow to only one chat per html document
    }

    function getQuestionContent() {
        return getQuestionElement().value.trim();
    }

    function sendQuestion() {
        const questionElement = getQuestionElement();
        const question = getQuestionContent();
        if (question === '') {
            return;
        }

        // TODO hide error message before sending new request

        sendApiCall(question);
        // const answer = {
        //     'role': 'assistant',
        //     'content': 'This is an answer to your question: ' + question,
        // };

        questionElement.value = '';
        // updateMessages(question, answer);
    }

    function sendApiCall(question) {
        const data = {
            question: question
        };
        axios.defaults.headers.common["X-WP-Nonce"] = ppwwChatgptEditorPluginData.nonce;
        alert('Sending question: ' + data);
        axios.post(ppwwChatgptEditorPluginData.rootUrl + '/wp-json/ppww-chatgpt/v1/chat/', data)
            .then(response => {
                console.log(response.data);
                updateMessages(question, response.data);
            })
            .catch(error => {
                const errorMessage = 'CHAT GPT API ERROR: ' + error.response.data.data.response.error.message;
                console.log(errorMessage);

                const errorElement = document.querySelector(".ppww-chatgpt-editor-block-error-message");
                // TODO use parent in above to take proper block error message
                // TODO then pass element and error message to showError function
                // TODO and then below 2 lines are not necessary (handled within a function)
                // TODO same you dont need to console.log error message as above
                errorElement.innerHTML = errorMessage;
                errorElement.style.display = 'block';
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
                    <TextControl id="chatgpt-question" label="Next question for ChatGPT" placeholder="Your next question" onChange={() => null}/>
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
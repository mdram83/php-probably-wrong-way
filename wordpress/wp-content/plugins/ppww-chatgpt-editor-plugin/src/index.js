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
    save: function() {
        return null;
    },
});

function EditComponent(props) {

    function getQuestionElement() {
        return document.querySelector("input[id='chatgpt-question']");
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
        axios.get(ppwwChatgptEditorPluginData.rootUrl + '/wp-json/ppww-chatgpt/v1/chat/', data)
            .then(response => {
                updateMessages(question, response.data);
            })
            .catch(error => {
                console.log(error);
            });
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
        </div>
    );
}
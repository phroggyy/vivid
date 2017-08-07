import * as SimpleMDE from 'simplemde';

let textElements = document.getElementsByClassName('md-editor');

for (let textElement of textElements) {
    new SimpleMDE(textElement);
}
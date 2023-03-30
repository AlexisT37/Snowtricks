document.addEventListener('DOMContentLoaded', () => {
    // Your code here


console.log('ImageLink.js loaded');

console.log('test before create');

const toto = document.querySelector('#createEdit');
console.log('toto');
console.log(toto);

var edit = false;

// if inner html of toto = 'Edit your trick' then print edit
if (toto.innerHTML === 'Edit trick') {
    console.log('edit');
    edit = true;
} else {
    console.log('create');
    
}
console.log('test after create');

// create a new link
const addImageLinkLink = document.createElement('a')
// add a css class to the link
addImageLinkLink.classList.add('add_imagelink_list')
// add set a fake href to the link
addImageLinkLink.href='#'
// add a text to the link
addImageLinkLink.innerText='Add a imagelink'
// adds a data attribute to the link
addImageLinkLink.dataset.collectionHolderClass='imagelinks'

// create a new list item and append the link to it
const newLinkLi = document.createElement('li').append(addImageLinkLink)

// get the ul element
const collectionHolder = document.querySelector('ul.imagelinks')
// append the new list item to the ul element
collectionHolder.appendChild(addImageLinkLink)

// add a click event listener to the link, the function will be called when the link is clicked, it takes an event as a parameter
const addImageFormToCollection = (e) => {
    e.preventDefault();
    const collectionHolderClass = e.currentTarget.dataset.collectionHolderClass;
    const collectionHolder = document.querySelector(`.${collectionHolderClass}`);
    const parentElement = collectionHolder.parentElement;

    // Count existing elements with a specific pattern in their id or for attributes
    const existingElements = parentElement.querySelectorAll(`input[id^='trick_imagelinks_']`);
    let maxIndex = -1;
    existingElements.forEach((inputElement) => {
        const idMatch = inputElement.id.match(/(?<=trick_imagelinks_)\d+/);
        if (idMatch) {
            const index = parseInt(idMatch[0], 10);
            if (index > maxIndex) {
                maxIndex = index;
            }
        }
    });
    const startIndex = maxIndex + 1;
    console.log('startIndex', startIndex)

    const item = document.createElement('li');
    item.innerHTML = collectionHolder
        .dataset
        .prototype
        .replace(
            /__name__/g,
            startIndex
        )
        // Fix the 'for' attribute of the label
        .replace(
            /for="trick_imagelinks___name___content"/g,
            `for="trick_imagelinks_${startIndex}_content"`
        );

    collectionHolder.appendChild(item);
    collectionHolder.dataset.index = startIndex + 1;

    const removelinkbutton = document.createElement('button');
    removelinkbutton.innerHTML = "Remove link";
    e.currentTarget.parentNode.appendChild(removelinkbutton);

    removelinkbutton.addEventListener("click", removeImageFormFromCollection)
}




function removeImageFormFromCollection(e) {
    // get the previous sibling of the button

    const sibling = e.currentTarget.previousSibling;
    // remove the parent element from the DOM
    sibling.remove();

    // also remove the button itself
    e.currentTarget.remove();
}

// add the click event listener to the link
addImageLinkLink.addEventListener("click", addImageFormToCollection)

// console.log(addImageLinkLink);

});
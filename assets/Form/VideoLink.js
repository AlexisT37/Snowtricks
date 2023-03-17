console.log('VideoLink.js loaded');

// create a new link
const addVideoLinkLink = document.createElement('a')
// add a css class to the link
addVideoLinkLink.classList.add('add_videolink_list')
// add set a fake href to the link
addVideoLinkLink.href='#'
// add a text to the link
addVideoLinkLink.innerText='Add a videolink'
// adds a data attribute to the link
addVideoLinkLink.dataset.collectionHolderClass='videolinks'

// create a new list item and append the link to it
const newLinkLi = document.createElement('li').append(addVideoLinkLink)

// get the ul element
const collectionHolder = document.querySelector('ul.videolinks')
// append the new list item to the ul element
collectionHolder.appendChild(addVideoLinkLink)

// add a click event listener to the link, the function will be called when the link is clicked, it takes an event as a parameter
const addVideoFormToCollection = (e) => {
    // finds the closest parent element with the class name specified in the data attribute, namely 'videolinks'
	const collectionHolder = document.querySelector('.' + e.currentTarget.dataset.collectionHolderClass);

    // create a new list item
    const item = document.createElement('li');

    // sets the innerHTML of the list item to the prototype of the collection
    item.innerHTML = collectionHolder
        // access the prototype attribute of the collection
        .dataset
        .prototype
        // replace the __name__ placeholder with the current index of the collection
        .replace(
            /__name__/g,
            collectionHolder.dataset.index
        );

    // append the new list item to the ul element
    collectionHolder.appendChild(item);

    // increment the index of the collection so that the next item will have a different index
    collectionHolder.dataset.index++;
}

// add the click event listener to the link
addVideoLinkLink.addEventListener("click", addVideoFormToCollection)

console.log(addVideoLinkLink);
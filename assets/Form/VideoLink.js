document.addEventListener('DOMContentLoaded', () => {


// create a new link
const addVideoLinkLink = document.createElement('a')
// add a css class to the link
addVideoLinkLink.classList.add('add_videolink_list')
// add set a fake href to the link
addVideoLinkLink.href='#'
// add a text to the link
addVideoLinkLink.innerText="Ajouter un lien de vidéo"
// adds a data attribute to the link
addVideoLinkLink.dataset.collectionHolderClass='videolinks'

// create a new list item and append the link to it
const newLinkLi = document.createElement('li').append(addVideoLinkLink)

// get the ul element
const collectionHolder = document.querySelector('ul.videolinks');
if(collectionHolder) {
    collectionHolder.appendChild(addVideoLinkLink);
}

// append the new list item to the ul element
        // add a click event listener to the link, the function will be called when the link is clicked, it takes an event as a parameter
        const addVideoFormToCollection = (e) => {
            // finds the closest parent element with the class name specified in the data attribute, namely 'videolinks'
            const collectionHolder = document.querySelector('.' + e.currentTarget.dataset.collectionHolderClass);

            if (collectionHolder) {
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

                // create a button below the link with an id of coucou
                const removelinkbutton = document.createElement('button');
                removelinkbutton.innerHTML = "Retirer le lien";
                // add the button as a sibling of the link
                e.currentTarget.parentNode.appendChild(removelinkbutton);

                // add a click event listener to the button
                removelinkbutton.addEventListener("click", removeVideoFormFromCollection)
                // if the button is clicked, the removeVideoFormFromCollection function will be called

                console.log('end test video link');
            }
        }


function removeVideoFormFromCollection(e) {
    // get the previous sibling of the button

    const sibling = e.currentTarget.previousSibling;
    // remove the parent element from the DOM
    sibling.remove();

    // also remove the button itself
    e.currentTarget.remove();
}

    try {
        if (addVideoFormToCollection) {
            // add the click event listener to the link
            addVideoLinkLink.addEventListener("click", addVideoFormToCollection);
        } else {
            console.log('no add video link');
        }
    } catch (error) {
        console.error('An error occurred:', error);
    }

});
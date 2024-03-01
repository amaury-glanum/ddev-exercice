import {$} from "../common/variables";

export const generateHtml = (parentNodeAnchor = "", textNode, html = "p") => {
  const modalBodyTextWrapper = document.querySelector(`${parentNodeAnchor}`);
  console.log('we enter generatehtml', modalBodyTextWrapper)
  // Check if the parentNode exists before manipulating the DOM
  if (modalBodyTextWrapper) {
    console.log("we enter modalBodyTextWrapper")

    const node = document.createElement(`${html}`);
    console.log('the current node', node)
    const textnode = document.createTextNode(textNode); // Use item instead of dataDescription
    console.log('node is ==> ', textNode)
    node.appendChild(textnode);
    modalBodyTextWrapper.appendChild(node);
    console.log("generate html ok")

  }
}

export function fetchData(dataSource = "", parentNodeAnchor = "", html, keys= {}) {

  const parentNode = document.querySelector(`${parentNodeAnchor}`)

  try {
    fetch(`${dataSource}`, {
      method: "GET",
      headers: {"Content-type": "application/json;charset=UTF-8"}
    })
      .then(response => {
        if (!response.ok) {
          throw new Error('La réponse du réseau n\'est pas ok');
        }
        return response.json();
      })
      .then(data => {
        $(parentNode).empty();
        // Iterate over the object JSON clients via data.
        data.forEach((item, index) => {
          console.log("item", item)
          keys.forEach((key, index) => {
            console.log("key", key)
            generateHtml(parentNodeAnchor, item[key], html);
          })
        });
      })
      .catch(err => {
        console.log('Error in fetch request', err);
      });
  } catch(err) {
    console.log('Error in fetch request', err);
  }
};

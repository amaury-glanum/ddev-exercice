export const showTabTarget = () => {
  const tabs = document.querySelectorAll('.project .js-tab-pill');

  function showTabContent(event) {
    const contents = document.querySelectorAll('.project .js-content__text');
    const clickedTab = event.currentTarget;
    const tabId = clickedTab.getAttribute('data-tab');
    console.log('current', event.currentTarget)
    tabs.forEach(tab => {
      tab.classList.remove('active');
    });
    clickedTab.classList.add('active');
    console.log('current after tab active')
    contents.forEach(content => {
      const contentId = content.getAttribute('data-content');
      if (contentId === tabId) {
        console.log('make content active')
        content.classList.add('active');
      } else {
        content.classList.remove('active');
      }
    });
  }

  tabs.forEach(tab => {
    console.log('click on tab', tab)
    tab.addEventListener('click', showTabContent);
  });
};


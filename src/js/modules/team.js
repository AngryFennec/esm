'use strict';

(function() {
  var prevBtns = Array.from(document.querySelectorAll('.team__list-btn--prev'));
  var nextBtns = Array.from(document.querySelectorAll('.team__list-btn--next'));
  var teams = Array.from(document.querySelectorAll('.team__list-item'));
  var teamSize = teams.length;
  var activeIndex = 0;
  var teamImgs = Array.from(document.querySelectorAll('.team__list-img img'));
  var teamContents = Array.from(document.querySelectorAll('.team__list-content'));
  var teamContent = document.querySelector('.team__content');

if (teams && prevBtns && nextBtns && teamImgs && teamContents && teamContent) {

  function teamsRemoveActive() {
    teams.forEach(function(item) {
      item.classList.remove('team__list-item--active');
    });
  }

  function setTop() {
    var top = 0;
    if (window.screen.width >=1024) {

    if (teams[activeIndex].classList.contains('team__list-item--maxim')) {
      top = teamImgs[activeIndex].clientHeight*0.55;
    }
    if (teams[activeIndex].classList.contains('team__list-item--vitaly')) {
      top = teamImgs[activeIndex].clientHeight*0.387;
    }
    if (teams[activeIndex].classList.contains('team__list-item--gleb')) {
      top = teamImgs[activeIndex].clientHeight*0.507;
    }
    if (teams[activeIndex].classList.contains('team__list-item--julia')) {
      top = teamImgs[activeIndex].clientHeight*0.367;
    }
    if (teams[activeIndex].classList.contains('team__list-item--denis')) {
      top = teamImgs[activeIndex].clientHeight*0.467;
    }
    if (window.screen.width <=1200) {
      top = top - 40;
    }
    teams[activeIndex].style.marginBottom = 0;
  teamContents[activeIndex].style.top = top + 'px';
teams[activeIndex].style.paddingTop= 0;

} else {
  teamContents[activeIndex].style.top = 0;
  teams[activeIndex].style.paddingTop = '93%';
  teams[activeIndex].style.marginBottom = '25%';
  if (window.screen.width <=370) {
    teamContents[activeIndex].style.top = 0;
    teams[activeIndex].style.paddingTop = '78%';
    teams[activeIndex].style.marginBottom = '15%';
  }
  if (window.screen.width <=500 && window.screen.width > 370)  {
    teamContents[activeIndex].style.top = 0;
    teams[activeIndex].style.paddingTop = '83%';
    teams[activeIndex].style.marginBottom = '15%';
  }
  if (window.screen.width > 500 && window.screen.width < 800) {
    teamContents[activeIndex].style.top = 0;
    teams[activeIndex].style.paddingTop = '93%';
    teams[activeIndex].style.marginBottom = '25%';
  }

}

  }


  nextBtns.forEach(function(item, i) {
    item.addEventListener('click', function(e) {
      teamsRemoveActive();
      if (i === teamSize - 1) {
        teams[0].classList.add('team__list-item--active');
        activeIndex = 0;
      } else {
      teams[i + 1].classList.add('team__list-item--active');
      activeIndex = i+1;
    }
      setTop();
    });
  });

  prevBtns.forEach(function(item, i) {
    item.addEventListener('click', function(e) {
      teamsRemoveActive();
      if (i === 0) {
        teams[teamSize - 1].classList.add('team__list-item--active');
        activeIndex = teamSize-1;
      } else {
      teams[i - 1].classList.add('team__list-item--active');
      activeIndex = i-1;
    }
      setTop();
    });
  });

  teamsRemoveActive();
    teams[0].classList.add('team__list-item--active');
  activeIndex = 0;
  setTop();

  window.addEventListener('resize', function(e) {
    setTop();
});
}
})();

'use strict';

(function() {
  var prevBtns = Array.from(document.querySelectorAll('.team__list-btn--prev'));
  var nextBtns = Array.from(document.querySelectorAll('.team__list-btn--next'));
  var teams = Array.from(document.querySelectorAll('.team__list-item'));
  var teamSize = teams.length;
  var activeIndex = 0;
  var teamImgs = Array.from(document.querySelectorAll('.team__list-img img'));
  var teamContents = Array.from(document.querySelectorAll('.team__list-content'));


  function teamsRemoveActive() {
    teams.forEach(function(item) {
      item.classList.remove('team__list-item--active');
    });
  }

  function setTop() {
    var top = 0;
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

    teamContents[activeIndex].style.top = top + 'px';
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
})();

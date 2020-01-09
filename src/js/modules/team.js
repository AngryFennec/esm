'use strict';

(function() {
  var prevBtns = Array.from(document.querySelectorAll('.team__list-btn--prev'));
  var nextBtns = Array.from(document.querySelectorAll('.team__list-btn--next'));
  var teams = Array.from(document.querySelectorAll('.team__list-item'));
  var teamSize = teams.length;

  function teamsRemoveActive() {
    teams.forEach(function(item) {
      item.classList.remove('team__list-item--active');
    });
  }

  nextBtns.forEach(function(item, i) {
    item.addEventListener('click', function(e) {
      teamsRemoveActive();
      if (i === teamSize - 1) {
        teams[0].classList.add('team__list-item--active');
      }
      teams[i + 1].classList.add('team__list-item--active');
    });
  });

  prevBtns.forEach(function(item, i) {
    item.addEventListener('click', function(e) {
      teamsRemoveActive();
      if (i === 0) {
        teams[teamSize - 1].classList.add('team__list-item--active');
      }
      teams[i - 1].classList.add('team__list-item--active');
    });
  });

  teamsRemoveActive();
  teams[0].classList.add('team__list-item--active');

})();

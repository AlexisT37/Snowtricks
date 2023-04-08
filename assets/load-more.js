const cardItems = document.querySelectorAll('.card-item');
const loadMoreBtn = document.getElementById('load-more');
const cardCount = document.getElementById('card-count');
const cardTotal = document.getElementById('card-total');
const batchSize = 10;

let currentBatch = batchSize;
hideCards(0, cardItems.length);
showCards(0, currentBatch);

// if the button hide-cards is clicked, hide all cards
if (document.getElementById('hide-cards')) {
  document.getElementById('hide-cards').addEventListener('click', () => {
    hideCards(0, cardItems.length);
    updateCardCount();
  });
}

function showCards(start, end) {
  for (let i = start; i < end; i++) {
    if (cardItems[i]) {
      cardItems[i].classList.remove('hidden');
    }
  }
}

function hideCards(start, end) {
  for (let i = start; i < end; i++) {
    if (cardItems[i]) {
      cardItems[i].classList.add('hidden');
    }
  }
}

function updateCardCount() {
  const visibleCount = document.querySelectorAll('.card-item:not(.hidden)').length;
  cardCount.innerText = visibleCount;
  cardTotal.innerText = cardItems.length;
}

function onLoadMore() {
  const start = currentBatch;
  const end = currentBatch + batchSize;
  showCards(start, end);
  currentBatch += batchSize;
  updateCardCount();
  if (currentBatch >= cardItems.length) {
    loadMoreBtn.classList.add('hidden');
  }
}


loadMoreBtn.addEventListener('click', onLoadMore);

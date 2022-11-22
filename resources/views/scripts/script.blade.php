<script>

const STORAGE_KEY = 'cartMaspos';
const RENDER_EVENT = 'render_cart';

function isStorageExist(){
  if (typeof (Storage) === undefined) {
    alert('Browser kamu tidak mendukung local storage');
    return false;
  }
  return true;
}

function saveData() {
  if (isStorageExist()) {
    const parsed = JSON.stringify(cart);
    sessionStorage.setItem(STORAGE_KEY, parsed);
  }
}

function loadData(){
  if (sessionStorage[STORAGE_KEY] !== undefined){
    console.log("storage loaded")
    cart = JSON.parse(sessionStorage.getItem(STORAGE_KEY));
  }
}
</script>
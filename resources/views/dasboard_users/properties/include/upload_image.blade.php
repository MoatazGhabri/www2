<style>
.drag-drop-area {
    border: 2px dashed #a0aec0;
    border-radius: 14px;
    background: #f9fafb;
    padding: 40px 20px;
    text-align: center;
    color: #4a5568;
    cursor: pointer;
    transition: border-color 0.3s, background 0.3s;
    margin-bottom: 20px;
}
.drag-drop-area.dragover {
    border-color: #667eea;
    background: #f0f4ff;
}
.drag-drop-area .upload-icon {
    font-size: 40px;
    color: #667eea;
    margin-bottom: 10px;
}
.drag-drop-area .upload-text {
    font-size: 16px;
    margin-bottom: 5px;
}
.drag-drop-area .upload-hint {
    color: #a0aec0;
    font-size: 13px;
}
.drag-preview-list {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    margin-top: 15px;
}
.drag-preview-item {
    position: relative;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    width: 120px;
    height: 120px;
    background: #fff;
}
.drag-preview-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.drag-preview-item .delete-btn {
    position: absolute;
    top: 5px;
    right: 5px;
    background: rgba(229,62,62,0.9);
    color: #fff;
    border: none;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 13px;
    z-index: 2;
}
.drag-preview-item .delete-btn:hover {
    background: #e53e3e;
}
</style>

<h6 class="my-4">Importer photo principal @include("includes.required")</h6>
<div class="drag-drop-area" id="mainDropArea" onclick="document.getElementById('mainImageInput').click()">
    <div class="upload-icon"><i class="fas fa-image"></i></div>
    <div class="upload-text">Déposez la photo principale ici ou cliquez pour sélectionner</div>
    <div class="upload-hint">Format JPG, PNG, Webp Max 1 image.</div>
    <input type="file" name="photos_main" id="mainImageInput" accept="image/jpeg,image/png,image/webp,image/gif" style="display:none" onchange="previewMainDrag(event)">
</div>
<div class="drag-preview-list" id="mainImagePreview"></div>

<h6 class="my-4">Importer des photos</h6>
<small style="color: red;margin-bottom: 5px !important">Remarque importante : La taille totale des images ne doit pas dépasser 2,5 Méga Merci de vérifier avant d'enregistrer votre annonce.</small>
<div class="drag-drop-area" id="multiDropArea" onclick="document.getElementById('multiImageInput').click()">
    <div class="upload-icon"><i class="fas fa-images"></i></div>
    <div class="upload-text">Déposez vos images ici ou cliquez pour sélectionner</div>
    <div class="upload-hint">Format JPG, PNG, Webp</div>
    <input type="file" name="photos_multiple[]" id="multiImageInput" accept="image/jpeg,image/png,image/webp,image/gif" multiple style="display:none" onchange="previewMultiDrag(event)">
</div>
<div class="drag-preview-list" id="multiImagePreview"></div>

<script>
// Drag & Drop pour la photo principale
const mainDrop = document.getElementById('mainDropArea');
const mainInput = document.getElementById('mainImageInput');
const mainPreview = document.getElementById('mainImagePreview');
mainDrop.addEventListener('dragover', e => { e.preventDefault(); mainDrop.classList.add('dragover'); });
mainDrop.addEventListener('dragleave', e => { mainDrop.classList.remove('dragover'); });
mainDrop.addEventListener('drop', e => {
    e.preventDefault();
    mainDrop.classList.remove('dragover');
    if (e.dataTransfer.files.length > 0) {
        mainInput.files = e.dataTransfer.files;
        previewMainDrag({target: mainInput});
    }
});
function previewMainDrag(event) {
    mainPreview.innerHTML = '';
    const file = event.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function(e) {
        const div = document.createElement('div');
        div.className = 'drag-preview-item';
        div.innerHTML = `<img src="${e.target.result}" alt="Preview"><button type="button" class="delete-btn" onclick="mainInput.value='';mainPreview.innerHTML='';"><i class='fas fa-times'></i></button>`;
        mainPreview.appendChild(div);
    };
    reader.readAsDataURL(file);
}
// Drag & Drop pour les images multiples
const multiDrop = document.getElementById('multiDropArea');
const multiInput = document.getElementById('multiImageInput');
const multiPreview = document.getElementById('multiImagePreview');
multiDrop.addEventListener('dragover', e => { e.preventDefault(); multiDrop.classList.add('dragover'); });
multiDrop.addEventListener('dragleave', e => { multiDrop.classList.remove('dragover'); });

// --- Ajout progressif pour les images multiples ---
let multiFilesArray = [];

multiDrop.addEventListener('drop', e => {
    e.preventDefault();
    multiDrop.classList.remove('dragover');
    if (e.dataTransfer.files.length > 0) {
        addMultiFiles(e.dataTransfer.files);
    }
});
multiInput.addEventListener('change', function(e) {
    if (e.target.files.length > 0) {
        addMultiFiles(e.target.files);
    }
});

function addMultiFiles(fileList) {
    let newFiles = Array.from(fileList);
    // Filtrer les doublons (par nom et taille)
    newFiles = newFiles.filter(f => !multiFilesArray.some(existing => existing.name === f.name && existing.size === f.size));
    multiFilesArray = multiFilesArray.concat(newFiles);
    updateMultiInputAndPreview();
}

function updateMultiInputAndPreview() {
    // Mettre à jour l'input file
    const dt = new DataTransfer();
    multiFilesArray.forEach(f => dt.items.add(f));
    multiInput.files = dt.files;
    // Mettre à jour la prévisualisation
    multiPreview.innerHTML = '';
    multiFilesArray.forEach((file, idx) => {
        const reader = new FileReader();
        reader.onload = function(e) {
            const div = document.createElement('div');
            div.className = 'drag-preview-item';
            div.innerHTML = `<img src="${e.target.result}" alt="Preview"><button type="button" class="delete-btn" onclick="removeMultiImage(${idx})"><i class='fas fa-times'></i></button>`;
            multiPreview.appendChild(div);
        };
        reader.readAsDataURL(file);
    });
}

function removeMultiImage(idx) {
    multiFilesArray.splice(idx, 1);
    updateMultiInputAndPreview();
}
</script>

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
    width: 200px;
    height: 120px;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
}
.drag-preview-item video {
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

<h6 class="my-4">Importer Vidéo</h6>
<small style="color: red;margin-bottom: 5px !important">Remarque importante : La durée totale de la vidéo ne doit pas dépasser 2 Minutes. Merci de vérifier avant d'enregistrer votre annonce.</small>
<div class="drag-drop-area" id="videoDropArea" onclick="document.getElementById('videoInput').click()">
    <div class="upload-icon"><i class="fas fa-video"></i></div>
    <div class="upload-text">Déposez la vidéo ici ou cliquez pour sélectionner</div>
    <div class="upload-hint">Format MP4, Max 1 vidéo, 2 minutes.</div>
    <input type="file" name="video" id="videoInput" accept="video/*" style="display:none" onchange="previewVideoDrag(event)">
</div>
<div class="drag-preview-list" id="videoPreviewList"></div>

<script>
const videoDrop = document.getElementById('videoDropArea');
const videoInput = document.getElementById('videoInput');
const videoPreviewList = document.getElementById('videoPreviewList');

videoDrop.addEventListener('dragover', e => { e.preventDefault(); videoDrop.classList.add('dragover'); });
videoDrop.addEventListener('dragleave', e => { videoDrop.classList.remove('dragover'); });
videoDrop.addEventListener('drop', e => {
    e.preventDefault();
    videoDrop.classList.remove('dragover');
    if (e.dataTransfer.files.length > 0) {
        videoInput.files = e.dataTransfer.files;
        previewVideoDrag({target: videoInput});
    }
});

function previewVideoDrag(event) {
    videoPreviewList.innerHTML = '';
    const file = event.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function(e) {
        const div = document.createElement('div');
        div.className = 'drag-preview-item';
        div.innerHTML = `<video src="${e.target.result}" controls></video><button type="button" class="delete-btn" onclick="videoInput.value='';videoPreviewList.innerHTML='';"><i class='fas fa-times'></i></button>`;
        videoPreviewList.appendChild(div);
    };
    reader.readAsDataURL(file);
}
</script>

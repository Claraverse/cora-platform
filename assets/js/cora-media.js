document.addEventListener("DOMContentLoaded", () => {
  const inspector = document.getElementById("coraMediaInspector");
  const closeBtn = document.getElementById("coraInspectorClose");

  const preview = document.getElementById("coraInspectorPreview");
  const title = document.getElementById("coraInspectorTitle");
  const type = document.getElementById("coraInspectorType");
  const url = document.getElementById("coraInspectorURL");

  document.querySelectorAll(".cora-media-card").forEach((card) => {
    card.addEventListener("click", () => {
      title.textContent = card.dataset.title || "—";
      type.textContent = card.dataset.type || "—";
      url.value = card.dataset.url || "";

      const thumb = card.dataset.thumb;
      preview.innerHTML = thumb
        ? `<img src="${thumb}" />`
        : `<div class="cora-media-placeholder">No preview</div>`;

      inspector.classList.add("open");
      document.body.classList.add("cora-inspector-open");
    });
  });

  closeBtn.addEventListener("click", () => {
    inspector.classList.remove("open");
    document.body.classList.remove("cora-inspector-open");
  });
});

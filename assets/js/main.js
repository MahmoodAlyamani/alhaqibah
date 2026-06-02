/* ========================= */
/* NAVBAR SCROLL EFFECT */
/* ========================= */

const navbar = document.getElementById("navbar");

window.addEventListener("scroll", () => {

    if (!navbar) return;

    if (window.scrollY > 40) {

        navbar.classList.add("scrolled");

    } else {

        navbar.classList.remove("scrolled");

    }

});

/* ========================= */
/* MOBILE MENU */
/* ========================= */

const menuToggle =
document.getElementById("menuToggle");

const navMenu =
document.getElementById("navMenu");

if (menuToggle && navMenu) {

    menuToggle.addEventListener("click", () => {

        navMenu.classList.toggle("active");

        menuToggle.classList.toggle("active");

    });

}

/* ========================= */
/* CLOSE MOBILE MENU */
/* ========================= */

document.querySelectorAll("#navMenu a").forEach(link => {

    link.addEventListener("click", () => {

        navMenu.classList.remove("active");

    });

});

/* ========================= */
/* SCROLL REVEAL */
/* ========================= */

function revealOnScroll() {

    const reveals =
    document.querySelectorAll(".reveal");

    reveals.forEach(item => {

        const windowHeight =
        window.innerHeight;

        const elementTop =
        item.getBoundingClientRect().top;

        const visible = 100;

        if (elementTop < windowHeight - visible) {

            item.classList.add("active");

        }

    });

}

window.addEventListener(
    "scroll",
    revealOnScroll
);

window.addEventListener(
    "load",
    revealOnScroll
);

/* ========================= */
/* PDF PREVIEW */
/* ========================= */

function openPreview(pdfPath) {

    const modal =
    document.getElementById("pdfModal");

    const frame =
    document.getElementById("pdfFrame");

    if (!modal || !frame) return;

    modal.classList.add("active");

    frame.src =
    pdfPath + "#toolbar=0&navpanes=0&scrollbar=0";

    document.body.style.overflow = "hidden";

}

/* ========================= */
/* CLOSE PREVIEW */
/* ========================= */

function closePreview() {

    const modal =
    document.getElementById("pdfModal");

    const frame =
    document.getElementById("pdfFrame");

    if (!modal || !frame) return;

    modal.classList.remove("active");

    frame.src = "";

    document.body.style.overflow = "auto";

}

/* ========================= */
/* CLOSE MODAL OUTSIDE */
/* ========================= */

window.addEventListener("click", function (e) {

    const modal =
    document.getElementById("pdfModal");

    if (e.target === modal) {

        closePreview();

    }

});

/* ========================= */
/* ESC CLOSE */
/* ========================= */

document.addEventListener("keydown", (e) => {

    if (e.key === "Escape") {

        closePreview();

        closeLightbox();

    }

});

/* ========================= */
/* IMAGE LIGHTBOX */
/* ========================= */

function openLightbox(imageSrc) {

    const lightbox =
    document.getElementById("imageLightbox");

    const lightboxImg =
    document.getElementById("lightboxImage");

    if (!lightbox || !lightboxImg) return;

    lightbox.classList.add("active");

    lightboxImg.src = imageSrc;

    document.body.style.overflow = "hidden";

}

function closeLightbox() {

    const lightbox =
    document.getElementById("imageLightbox");

    if (!lightbox) return;

    lightbox.classList.remove("active");

    document.body.style.overflow = "auto";

}

/* ========================= */
/* SEARCH SYSTEM */
/* ========================= */

function initSearch() {

    const searchInput =
    document.getElementById("searchInput");

    if (!searchInput) return;

    searchInput.addEventListener("keyup", () => {

        const value =
        searchInput.value.toLowerCase();

        const cards =
        document.querySelectorAll(".file-card");

        cards.forEach(card => {

            const name =
            card.dataset.name.toLowerCase();

            if (name.includes(value)) {

                card.style.display = "block";

            } else {

                card.style.display = "none";

            }

        });

    });

}

/* ========================= */
/* CATEGORY ACTIVE */
/* ========================= */

function initCategories() {

    const categoryItems =
    document.querySelectorAll(".category-item");

    categoryItems.forEach(item => {

        item.addEventListener("click", () => {

            categoryItems.forEach(el => {

                el.classList.remove("active");

            });

            item.classList.add("active");

        });

    });

}

/* ========================= */
/* LOAD CATEGORY PRODUCTS */
/* ========================= */

async function loadProducts() {

    const container =
    document.getElementById("categoryProducts");

    if (!container) return;

    container.innerHTML = "";

    try {

        const response =
        await fetch("../data/products.json");

        const products =
        await response.json();

        const path =
        window.location.pathname;

        let currentCategories = [];

        if (path.includes("teachers")) {

            currentCategories = [
                "ملفات المعلمين",
                "الخطط التعليمية",
                "ملفات الإنجاز"
            ];

        }

        else if (path.includes("management")) {

            currentCategories = [
                "ملفات الإدارة المدرسية"
            ];

        }

        else if (path.includes("activity")) {

            currentCategories = [
                "النشاط الطلابي"
            ];

        }

        else if (path.includes("health")) {

            currentCategories = [
                "التوجيه الصحي"
            ];

        }

        else if (path.includes("supervisors")) {

            currentCategories = [
                "التوجيه الطلابي"
            ];

        }

        else if (path.includes("professional-development")) {

            currentCategories = [
                "التطوير المهني"
            ];

        }

        const filteredProducts =
        products.filter(product =>

            currentCategories.includes(
                product.category
            )

        );

        filteredProducts.forEach((product, index) => {

            container.innerHTML += `

            <div class="file-card reveal delay-${(index % 4) + 1}"
            data-name="${product.title}">

                <div class="file-preview">

                    <img
                    src="../${product.image}"
                    alt="${product.title}">

                </div>

                <div class="file-content">

                    <span class="file-category">

                        ${product.category}

                    </span>

                    <h3>

                        ${product.title}

                    </h3>

                    <p>

                        ${product.description}

                    </p>

                    <div class="file-buttons">

                        <a
                        href="product.php?id=${product.id}"
                        class="preview-btn">

                            عرض التفاصيل

                        </a>

                        <a
                        href="${product.whatsapp}"
                        class="whatsapp-file-btn"
                        target="_blank">

                            <i class="fa-brands fa-whatsapp"></i>

                            طلب الملف

                        </a>

                    </div>

                </div>

            </div>

            `;

        });

        revealOnScroll();

    } catch (error) {

        console.log(
            "Error Loading Products:",
            error
        );

    }

}

/* ========================= */
/* FEATURED PRODUCTS */
/* ========================= */

async function loadFeaturedProducts() {

    const container =
    document.getElementById("featuredProducts");

    if (!container) return;

    try {

        const response =
        await fetch("data/products.json");

        const products =
        await response.json();

        const featured =
        products.filter(
            item => item.featured === true
        );

        featured.forEach(product => {

            container.innerHTML += `

            <div class="featured-card reveal">

                <img
                src="${product.image}"
                alt="${product.title}">

                <div class="featured-content">

                    <span>

                        ${product.category}

                    </span>

                    <h3>

                        ${product.title}

                    </h3>

                    <p>

                        ${product.description}

                    </p>

                    <a href="pages/product.php?id=${product.id}">

                        عرض التفاصيل

                    </a>

                </div>

            </div>

            `;

        });

        revealOnScroll();

    } catch (error) {

        console.log(error);

    }

}

/* ========================= */
/* LOAD SINGLE PRODUCT */
/* ========================= */

async function loadProduct() {

    const title =
    document.getElementById("productTitle");

    if (!title) return;

    try {

        const response =
        await fetch("../data/products.json");

        const products =
        await response.json();

        const params =
        new URLSearchParams(window.location.search);

        const id =
        params.get("id");

        const product =
        products.find(
            item => item.id === id
        );

        if (!product) return;

    } catch (error) {

        console.log(
            "Error Loading Product:",
            error
        );

    }

}

/* ========================= */
/* RELATED PRODUCTS */
/* ========================= */

async function loadRelatedProducts() {

    const container =
    document.getElementById("relatedProducts");

    if (!container) return;

    try {

        const response =
        await fetch("../data/products.json");

        const products =
        await response.json();

        const params =
        new URLSearchParams(window.location.search);

        const id =
        params.get("id");

        const currentProduct =
        products.find(
            item => item.id === id
        );

        if (!currentProduct) return;

        const related =
        products.filter(product =>

            product.category ===
            currentProduct.category &&

            product.id !==
            currentProduct.id

        ).slice(0, 3);

        related.forEach(product => {

            container.innerHTML += `

            <div class="related-card">

                <img
                src="../${product.image}"
                alt="${product.title}">

                <div class="related-content">

                    <span>

                        ${product.category}

                    </span>

                    <h3>

                        ${product.title}

                    </h3>

                    <p>

                        ${product.description}

                    </p>

                    <a href="product.php?id=${product.id}">

                        عرض التفاصيل

                    </a>

                </div>

            </div>

            `;

        });

    } catch (error) {

        console.log(error);

    }

}

/* ========================= */
/* BACK BUTTON */
/* ========================= */

function goBack() {

    window.history.back();

}

/* ========================= */
/* INIT */
/* ========================= */

document.addEventListener("DOMContentLoaded", () => {

    initSearch();

    initCategories();

    /* CATEGORY PRODUCTS */

    if (
        document.getElementById("categoryProducts")
    ) {

        loadProducts();

    }

    /* FEATURED PRODUCTS */

    if (
        document.getElementById("featuredProducts")
    ) {

        loadFeaturedProducts();

    }

    /* RELATED PRODUCTS */

    if (
        document.getElementById("relatedProducts")
    ) {

        loadRelatedProducts();

    }

    /* SINGLE PRODUCT */

    if (
        window.location.pathname.includes("product.php")
    ) {

        loadProduct();

    }

}); 

/* ========================= */
/* CHANGE IMAGE */
/* ========================= */

function changeImage(imageSrc) {

    const productImage =
    document.getElementById("productImage");

    if (!productImage) return;

    productImage.src = imageSrc;

}
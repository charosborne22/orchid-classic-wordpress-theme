// Navigation animation
const navBtn = document.querySelector(".orchid-nav-icon");
let isActive = false;

gsap.fromTo(".orchid-main-header", { y: "-100%" }, { y: 0, duration: 0.2 });

navBtn.addEventListener("click", () => {
  isActive = !isActive;

  if (!isActive) {
    gsap.to(".orchid-primary-container", {
      x: "100%",
      duration: 0.4,
      ease: "slow",
    });
    gsap.fromTo(
      ".orchid-line1",
      { rotate: "45deg", x: -3, y: 8 },
      { rotate: 0, x: 0, y: 0 }
    );
    gsap.fromTo(".orchid-line2", { opacity: 0 }, { opacity: 1 });
    gsap.fromTo(
      ".orchid-line3",
      { rotate: "-45deg", x: -3, y: -8 },
      { rotate: 0, x: 0, y: 0 }
    );
  } else {
    gsap.to(".orchid-primary-container", {
      x: "-100%",
      duration: 0.4,
    });
    gsap.fromTo(
      ".orchid-line1",
      { rotate: 0, x: 0, y: 0 },
      { rotate: "45deg", x: -3, y: 8 }
    );
    gsap.fromTo(".orchid-line2", { opacity: 1 }, { opacity: 0 });
    gsap.fromTo(
      ".orchid-line3",
      { rotate: 0, x: 0, y: 0 },
      { rotate: "-45deg", x: -3, y: -8 }
    );
  }
});

// Animate comment form fields if user not logged in
const body = document.querySelector("body");

if (
  !body.classList.contains("logged-in") &&
  body.classList.contains("single")
) {
  const commentForm = document.querySelector(
    ".orchid-comment-form .comment-form-comment"
  );

  const author = document.querySelector(
    ".orchid-comment-form .comment-form-author"
  );
  const email = document.querySelector(
    ".orchid-comment-form .comment-form-email"
  );
  const website = document.querySelector(
    ".orchid-comment-form .comment-form-url"
  );

  const fields = [author, email, website];

  fields.forEach((field) => {
    gsap.set(field, {
      display: "none",
      opacity: 0,
      y: "-100%",
    });
  });

  commentForm.addEventListener("click", () => {
    fields.forEach((field) => {
      gsap.to(field, { display: "block", opacity: 1, y: 0 });
    });
  });
}

// Animate posts
// gsap.set(".orchid-card", { opacity: 0 });
gsap.registerPlugin(ScrollTrigger);
gsap.set(".orchid-card", { opacity: 0 });
ScrollTrigger.batch(".orchid-card", {
  onEnter: (batch) => gsap.to(batch, { opacity: 1, stagger: 0.4 }),
});

// Animate sidebar and main content in
gsap.fromTo(
  ".orchid-sidebar",
  { opacity: 0, x: 50 },
  { opacity: 1, x: 0, duration: 0.2 }
);

gsap.fromTo(
  ".orchid-main-content",
  { opacity: 0, x: -50 },
  { opacity: 1, x: 0, duration: 0.2 }
);

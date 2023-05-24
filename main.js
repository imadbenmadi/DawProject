const openMessage = () => {
  const message = document.querySelector(".prof-message");
  message.style.display = "block";
  message.classList.remove("slide-down");
  message.classList.add("slide-up");
};

const closeMessage = () => {
  const message = document.querySelector(".prof-message");
  message.classList.remove("slide-up");
  message.classList.add("slide-down");

  const transitionDuration = 500; // Adjust the transition duration (in milliseconds) to match your CSS
  setTimeout(() => {
    message.style.display = "none";
    message.classList.remove("slide-down");
  }, transitionDuration);
};

document.querySelector(".openMessage").addEventListener("click", openMessage);

document
  .querySelector(".prof-message-exit")
  .addEventListener("click", closeMessage);

document
  .querySelector(".prof-message")
  .addEventListener("transitionend", (event) => {
    if (event.propertyName === "transform") {
      const message = event.target;
      if (!message.classList.contains("slide-up")) {
        message.style.display = "none";
      }
    }
  });

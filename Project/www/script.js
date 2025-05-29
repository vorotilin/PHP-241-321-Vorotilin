document.addEventListener('DOMContentLoaded', function() {
  const modal = document.getElementById('loginModal');
  const openBtn = document.getElementById('openLoginModal');
  const closeBtn = document.querySelector('.modal-close');

  function openModal() {
    document.body.style.overflow = 'hidden'; 
    modal.classList.add('active');
  }

  function closeModal() {
    document.body.style.overflow = '';
    modal.classList.remove('active');
  }

  if (openBtn) {
    openBtn.addEventListener('click', openModal);
  }

  if (closeBtn) {
    closeBtn.addEventListener('click', closeModal);
  }

  modal.addEventListener('click', function(e) {
    if (e.target === modal) {
      closeModal();
    }
  });

  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && modal.classList.contains('active')) {
      closeModal();
    }
  });

  if (window.location.search.includes('auth_error=1')) {
    openModal();
  }
  const loginModal = document.getElementById("loginModal");
    const registerModal = document.getElementById("registerModal");

    document.getElementById("openLoginModal").addEventListener("click", function() {
      loginModal.style.display = "block";
    });

    document.getElementById("openRegisterModal").addEventListener("click", function() {
      registerModal.style.display = "block";
    });

    document.querySelectorAll(".modal-close").forEach(btn => {
      btn.addEventListener("click", function() {
        loginModal.style.display = "none";
        registerModal.style.display = "none";
      });
    });

    window.addEventListener("click", function(e) {
      if (e.target === loginModal) loginModal.style.display = "none";
      if (e.target === registerModal) registerModal.style.display = "none";
    });
});




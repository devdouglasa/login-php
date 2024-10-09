// Exemplo de efeito de transição ao rolar a página
const sections = document.querySelectorAll('section');

sections.forEach(section => {
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                section.classList.add('show');
            } else {
                section.classList.remove('show');
            }
        });
    });

    observer.observe(section);
});
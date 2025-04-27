import Echo from "laravel-echo";

import Pusher from "pusher-js";
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "reverb",
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? "https") === "https",
    enabledTransports: ["ws", "wss"],
});
window.Echo.channel("promos").listen(".promo.new", (event) => {
    console.log("Promo baru:", event.promo);

    const promo = event.promo;

    // Buat card
    const card = document.createElement("div");
    card.style.border = "1px solid #ccc";
    card.style.borderRadius = "8px";
    card.style.padding = "16px";
    card.style.width = "250px";
    card.style.boxShadow = "0 2px 8px rgba(0, 0, 0, 0.1)";
    card.style.backgroundColor = "#fff";

    card.innerHTML = `
            <h3 style="margin-top: 0; color: #2c3e50;">${promo.title}</h3>
            <p style="color: #7f8c8d;">${promo.description}</p>
            <p style="font-weight: bold; color: #e74c3c;">Diskon ${promo.discount}%</p>
        `;

    // Tambahkan card ke list
    const promoList = document.getElementById("promo-list");
    promoList.prepend(card); // Prepend supaya promo baru muncul di atas
});

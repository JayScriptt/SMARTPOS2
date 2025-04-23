<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KVS</title>
    <script src="app.js" defer></script>
    <link href="../output.css" rel="stylesheet" />
  </head>
  <body class="bg-gray-900 text-white font-sans min-h-screen p-4">
    <h1 class="text-3xl font-bold mb-6 text-center">
      Kitchen Video System (KVS)
    </h1>

    <div
      id="ordersContainer"
      class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4"
    >
      <!-- Orders will be injected here -->
    </div>
    <script>
      const orders = [
        { id: 1, items: ["Burger", "Fries", "Soda"] },
        { id: 2, items: ["Milk Tea", "Egg Sandwich"] },
        { id: 3, items: ["Spaghetti", "Iced Tea"] },
        { id: 4, items: ["Spaghetti", "Iced Tea"] },
      ];

      function createOrderCard(order) {
        const card = document.createElement("div");
        card.className =
          "bg-gray-800 p-4 rounded-xl shadow-lg flex flex-col justify-between";

        const itemsList = order.items
          .map((item) => `<li>${item}</li>`)
          .join("");
        const timestamp = new Date().toLocaleTimeString();

        card.innerHTML = `
    <div>
      <h2 class="text-xl font-semibold mb-2">Order #${order.id}</h2>
      <ul class="list-disc ml-4">${itemsList}</ul>
    </div>
    <div class="mt-4 flex justify-between items-center">
      <p class="text-sm text-gray-400">⏱ ${timestamp}</p>
      <button class="bg-green-500 text-white px-4 py-1 rounded-full text-sm bump-btn hover:bg-green-600">Bump</button>
    </div>
  `;

        card.querySelector(".bump-btn").addEventListener("click", () => {
          card.remove(); // remove the card on bump
        });

        return card;
      }

      const container = document.getElementById("ordersContainer");
      orders.forEach((order) => {
        const card = createOrderCard(order);
        container.appendChild(card);
      });
    </script>
  </body>
</html>

<x-mail-layout :title="$title">
    <div class="wi-full min-h-screen flex justify-center items-center">
        <div id="card" class="w-2/4 min-h-96 p-12 bg-gray-300 rounded-lg shadow-lg">
            <h1 class="text-4xl font-bold sans text-center mb-4 text-[#5937E0]">Bonjour, <span
                    class="text-[#5937E0]">Name</span></h1>
            <p class="text-lg mb-2">Nous vous remercions chaleureusement pour votre réservation.</p>
            <p class="text-lg mb-2 font-semibold text-[#5937E0]">Détails de votre réservation :</p>
            <ul class="list-disc list-inside mb-4">
                <li class="text-lg"><strong>Date de début :</strong> <span class="text-[#5D3FD3]">XX/XX/XXXX</span></li>
                <li class="text-lg"><strong>Date de fin :</strong> <span class="text-[#5D3FD3]">XX/XX/XXXX</span></li>
                <li class="text-lg"><strong>Type de véhicule :</strong> <span class="text-[#5D3FD3]">X voiture</span>
                </li>
            </ul>
            <p class="text-lg mb-2 font-semibold text-[#5937E0]">Le montant total à régler dans notre agence s'élève à
                <span class="text-[#5D3FD3]"><strong>$X</strong></span>.</p>
            <p class="text-lg mb-4">Nous vous remercions de votre confiance et de votre fidélité.</p>
            <p class="text-lg">Nous avons hâte de vous accueillir et de vous offrir un service de qualité.</p>
            <p class="text-lg">Cordialement,</p>
            <p class="text-lg font-semibold text-[#5937E0]">L'équipe de <em>Rent a Car</em></p>
        </div>
    </div>
</x-mail-layout>

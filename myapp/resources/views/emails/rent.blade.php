@props([
    'name' => 'Undefined',
    'vehicule_name' => 'Undefined',
    'start_date' => 'XX/XX/XXXX',
    'end_date' => 'XX/XX/XXXX',
    'total_price' => 0,
])

<x-mail-layout>
    <div
        style="width: 100%; min-height: 500px; padding: 50xp 0; display: flex; justify-content: center; align-items: center; background-color: #f3f4f6;">
        <div
            style="width: 100%; min-height: 384px; padding: 48px; background-color: #e5e7eb; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
            <h1 style="font-size: 2.25rem; font-weight: bold; text-align: center; margin-bottom: 16px; color: #5937E0;">
                Bonjour, <span style="color: #5937E0;">{{ $name }}</span>
            </h1>
            <p style="font-size: 1.125rem; margin-bottom: 8px;">Nous vous remercions chaleureusement pour votre
                réservation.</p>
            <p style="font-size: 1.125rem; margin-bottom: 8px; font-weight: bold; color: #5937E0;">Détails de votre
                réservation :</p>
            <ul style="list-style-type: disc; padding-left: 20px; margin-bottom: 16px;">
                <li style="font-size: 1.125rem;">
                    <strong>Date de début :</strong> <span style="color: #5D3FD3;">{{ $start_date }}</span>
                </li>
                <li style="font-size: 1.125rem;">
                    <strong>Date de fin :</strong> <span style="color: #5D3FD3;">{{ $end_date }}</span>
                </li>
                <li style="font-size: 1.125rem;">
                    <strong>Type de véhicule :</strong> <span style="color: #5D3FD3;">{{ $vehicule_name }}</span>
                </li>
            </ul>
            <p style="font-size: 1.125rem; margin-bottom: 8px; font-weight: bold; color: #5937E0;">
                Le montant total à régler dans notre agence s'élève à <span
                    style="color: #5D3FD3;"><strong>${{ $total_price }}</strong></span>.
            </p>
            <p style="font-size: 1.125rem; margin-bottom: 16px;">Nous vous remercions de votre confiance et de votre
                fidélité.</p>
            <p style="font-size: 1.125rem;">Nous avons hâte de vous accueillir et de vous offrir un service de qualité.
            </p>
            <p style="font-size: 1.125rem;">Cordialement,</p>
            <p style="font-size: 1.125rem; font-weight: bold; color: #5937E0;">L'équipe de <em>Rent a Car</em></p>
        </div>
    </div>
</x-mail-layout>

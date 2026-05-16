@extends('layouts.app')
@section('pageTitle')
Conditions Générales d’Utilisation
@endsection
@section('content')

<style>
    .py-120 {
        margin-top: 120px;
    }
    @media (max-width: 768px) {
        .py-120 {
            margin-top: 90px;
        }
    }
    .terms-section {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 6px 32px rgba(44,62,80,0.07);
        padding: 2.5rem 2rem;
        margin-bottom: 2rem;
        max-width: 950px;
        margin-left: auto;
        margin-right: auto;
        position: relative;
        overflow: hidden;
    }
    .terms-title {
        font-size: 2.4rem;
        font-weight: 800;
        color: #fc3131;
        margin-bottom: 1.2rem;
        text-align: center;
        letter-spacing: 1px;
        position: relative;
    }
    .terms-title::after {
        content: "";
        display: block;
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, #fc3131 0%, #3498db 100%);
        margin: 16px auto 0 auto;
        border-radius: 2px;
    }
    .terms-subtitle {
        font-size: 1.25rem;
        font-weight: 700;
        color: #2c3e50;
        margin-top: 2.2rem;
        margin-bottom: 0.7rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .terms-subtitle::before {
        content: "•";
        color: #fc3131;
        font-size: 1.5rem;
        font-weight: bold;
        margin-right: 0.5rem;
    }
    .terms-list {
        margin-left: 1.5rem;
        margin-bottom: 1.2rem;
        padding-left: 0.5rem;
    }
    .terms-list > li {
        margin-bottom: 0.5rem;
        line-height: 1.7;
        position: relative;
        padding-left: 0.2em;
        list-style-type: decimal;
    }
    /* Remove arrow for main list */
    .terms-list > li::before {
        content: none;
    }
    /* Flèche rouge pour la sous-liste uniquement */
    .terms-sublist li {
        margin-bottom: 0.5rem;
        line-height: 1.7;
        position: relative;
        padding-left: 1.2em;
        list-style-type: none;
    }
    .terms-sublist li::before {
        content: "→";
        color: #fc3131;
        position: absolute;
        left: 0;
        font-size: 1em;
        top: 0.1em;
    }
    .highlight {
        color: #fc3131;
        font-weight: 600;
    }
    .terms-section p {
        font-size: 1.08rem;
        color: #222;
        margin-bottom: 1.1rem;
        line-height: 1.7;
    }

</style>

<div class="py-120">
    <div class="terms-section">
        <div class="terms-title">Conditions Générales d’Utilisation</div>
        <div class="terms-subtitle">Obligations du Locataire du Site</div>
        <ol class="terms-list">
            <li>
                Le Locataire s’engage à respecter les termes des présentes et à utiliser le Site de manière conforme aux instructions de la <span class="highlight">Société Azur Plateformes & Events</span>.
            </li>
            <li>
                Le Locataire convient qu’il n’utilise le Site que conformément aux présentes Conditions Générales. À cet égard, il s’engage à s’abstenir :
                <ul class="terms-sublist">
                    <li>D’utiliser le Site de toute manière illégale, pour toute finalité illégale ou de toute manière incompatible avec ces Conditions Générales.</li>
                    <li>De vendre, copier, reproduire, louer, prêter, distribuer, transférer ou concéder sous licence tout ou partie des contenus figurant sur le Site ou de décompiler, désosser, désassembler, modifier, afficher sous forme lisible par le Client, tenter de découvrir tout code source ou utiliser tout logiciel activant ou comprenant tout ou partie du Site.</li>
                    <li>De tenter d’obtenir l’accès non autorisé au système informatique du Site ou de se livrer à toute activité perturbant, diminuant la qualité ou interférant avec les performances ou détériorant les fonctionnalités du Site.</li>
                    <li>D’utiliser le Site à des fins abusives en y introduisant volontairement des virus ou tout autre programme malveillant et de tenter d’accéder de manière non autorisée au Site.</li>
                    <li>De porter atteinte aux droits de propriété intellectuelle de la Société et/ou de revendre ou de tenter de revendre les produits à des tiers.</li>
                    <li>De dénigrer le Site et/ou les produits ainsi que la Société sur les réseaux sociaux et tout autre moyen de communication.</li>
                    <li>De tenir des propos insultants, violents, racistes, sexistes, homophobes, xénophobes ou mensongers.</li>
                    <li>D’utiliser des photos choquantes ou pouvant porter atteinte à autrui.</li>
                </ul>
            </li>
            <li>
                Si, pour un quelconque motif, la Société considère que Le Locataire ne respecte pas les présentes Conditions Générales, la Société peut à tout moment, et à son entière discrétion, supprimer son accès au Site et prendre toutes mesures incluant toute action judiciaire, civile et pénale à son encontre.
            </li>
        </ol>

        <div class="terms-subtitle">Déclarations</div>
        <p>
            Le Locataire convient que son Contenu ne viole aucun droit d'auteur, droits de la propriété intellectuelle ou d'autres droits de toute personne ou entité. Les clients du Locataire acceptent de libérer <span class="highlight">La société Azur Plateformes & Events</span> de toute obligation, responsabilité et demande découlant ou en relation avec l’utilisation de ou l’impossibilité d’utiliser le service, sous n’importe quelle théorie de responsabilité ou n’importe quel fondement juridique, y compris les dommages et les coûts.
        </p>

        <div class="terms-subtitle">Responsabilité</div>
        <p>
            <span class="highlight">La société Azur Plateformes & Events</span> agit uniquement comme intermédiaire en hébergeant les produits et offres de services proposés par Le Locataire.<br>
            Ainsi, la Société ne peut pas être considérée comme un revendeur des Produits qui sont proposés par Le Locataire. Le Locataire devra sous sa seule responsabilité assurer l’ensemble de la gestion de la relation client.<br>
            <span class="highlight">La société Azur Plateformes & Events</span> ne saurait être tenue responsable de l'utilisation du site et renonce à toute responsabilité pour toute perte, préjudice, responsabilité, ou dommage de toute nature résultant et découlant de :
        </p>
        <ul class="terms-sublist">
            <li>Des erreurs ou omissions afférentes aux plateformes de La société Azur et aux contenus, y compris et sans limitation aux inexactitudes techniques ou aux erreurs typographiques.</li>
            <li>Des sites web de tiers ou de contenu directement ou indirectement accessible via les liens présents sur les plateformes de la Société Azur.</li>
            <li>De l'indisponibilité des plateformes de la société Azur ou de tout élément de ce dernier.</li>
            <li>De votre usage du site web.</li>
            <li>De votre usage de tout équipement ou logiciel sur les plateformes de la société Azur.</li>
        </ul>

        <div class="terms-subtitle">Données Personnelles</div>
        <p>
            <span class="highlight">La société Azur Plateformes & Events</span> a le droit de coopérer avec les autorités dans le cas où le contenu serait en infraction avec la réglementation en vigueur.<br>
            <span class="highlight">La société Azur Plateformes & Events</span> se réserve le droit de rechercher toutes les voies de recours disponibles en matière de droit en cas de violation des conditions d’utilisation du site et notamment le droit de bloquer l'accès aux Plateformes de La société Azur Plateformes & Events et à ses fonctionnalités.
        </p>

        <div class="terms-subtitle">Indemnisation</div>
        <p>
            Le Locataire s'engage à indemniser, défendre et dégager <span class="highlight">La société Azur Plateformes & Events</span>, contre toutes les pertes, dépenses, dommages et coûts, y compris les honoraires d'avocats, résultant de toute violation de ces modalités et conditions, y compris tout comportement fautif ou négligent de la part des toute personne accédant aux plateformes de la société Azur.
        </p>

        <div class="terms-subtitle">Modification</div>
        <p>
            <span class="highlight">La société Azur Plateformes & Events</span> se réserve le droit de modifier les conditions générales d’utilisation du site à n'importe quel moment dans la mesure permise par la loi applicable. Vous êtes responsable de consulter régulièrement telles modifications et votre accès régulier ou utilisation des plateformes de la société Azur doit être considérée comme votre approbation des modalités et conditions modifiées.
        </p>

        <div class="terms-subtitle">Loi applicable</div>
        <p>
            <span class="highlight">La société Azur Plateformes & Events</span> opère sous la loi et les législations tunisiennes. Les annonceurs conviennent que tout litige ou réclamation afférent à l'utilisation de plateformes de la société Azur sera de la compétence exclusive des tribunaux Tunisien.
        </p>
    </div>


</div>
@endsection
<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Petition;
use App\Entity\PetitionOutputFormat;
use App\Forms\PetitionOutputFormatType;
use App\Service\Petition\PetitionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PetitionController extends AbstractController
{
    const FEED_ID = 2372;

    private $petitionService;

    /**
     * PetitionController constructor.
     * @param PetitionService $petitionService
     */
    public function __construct(
        PetitionService $petitionService
    ) {
        $this->petitionService = $petitionService;
    }

    /**
     * @Route("/", name="index")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $form = $this->createForm(PetitionOutputFormatType::class, null, [
                'action' => $this->generateUrl('petition')
        ]);

        return $this->render('base.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/api/petition", name="petition")
     * @param Request $request
     * @return Response
     */
    public function getCSVAction(Request $request)
    {
        /** @var PetitionOutputFormat $format */
        $format = new PetitionOutputFormat();
        /** @var PetitionOutputFormatType $form */
        $form = $this->createForm(PetitionOutputFormatType::class, $format);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var Petition[] $petitions */
            $petitions = $this->petitionService->getPetitions(self::FEED_ID);

            $response = $this->petitionService->getCSVDocument($petitions, $format);
            $response->headers->set('Content-Type', 'application/csv');
            $response->headers->set('Content-Disposition', 'attachment; filename=report.csv');
            $response->headers->set('Pragma', 'no-cache');

            return $response;
        } else {
            throw new \Exception("Form validation error");
        }
    }
}

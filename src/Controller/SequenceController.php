<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Regex;

class SequenceController extends AbstractController
{
    /**
     * @Route()
     * @param Request $request
     * @return Response
     */
    public function maxValues(Request $request)
    {
        $results = [];
        $nList = [];

        $form = $this->createFormBuilder()
            ->add('nList', TextareaType::class, [
                'empty_data' => 'Provide here up to 10 n numbers, each one in new line.',
                'required' => true,
                'label' => 'List of n numbers',
                'attr' => ['rows' => 10],
                'constraints' => [new Regex([
                    'pattern' => '/^(([0-9]{1,5})\r?\n?){1,10}$/',
                    'message' => 'It should contain up to 10 positive integer numbers between 0 and 99999, each one in new line.',
                ])]
            ])
            ->add('calculate', SubmitType::class, [
                'label' => 'Calculate max values'
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $nList = explode("\n", $form->getData()['nList']);
            $results = array_map('App\Math\SternBrocotSequence::calculateMaxValueInSentence', $nList);
        }

        return $this->render('sequence/max_values.html.twig', [
            'form' => $form->createView(),
            'results' => $results,
            'nList' => $nList,
        ]);
    }
}

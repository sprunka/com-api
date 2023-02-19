<?php

/**
 * @OA\Info(
 *   title="OpenAPI Docs for VampyreBytes's City of Mist API",
 *   description="This product was created as a fan devotion.",
 *   version="0.0.1",
 *   @OA\Contact(
 *     name="Vampyre Bytes",
 *     email="admin@vampyrebytes.com"
 *   )
 * )
 *
 * @OA\Server(
 *     url="https://com.vampyrebytes.com"
 * )
 */

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

use CoMAPI\Generate\Gender;
use CoMAPI\Generate\Name;
use CoMAPI\Generate\NPC;
use CoMAPI\Generate\Occupation;
use CoMAPI\Generate\PhysicalDescription;
use CoMAPI\Generate\Voice;

return function (App $app) {
    $app->get('/', function (
        ServerRequestInterface $request,
        ResponseInterface $response
    ) {
        $response->getBody()->write(json_encode(["Refer to the documentation at /openapi"], JSON_PRETTY_PRINT));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    });

    /**
     * @OA\Get(
     *     path="/openapi.json",
     *     summary="Returns the OpenAPI 3.0 documentation in JSON format.",
     *     tags={"Documentation"},
     *     @OA\Response(
     *         response="200",
     *         description="The OpenAPI 3.0 documentation in JSON format. This documentation provides details on all
     * available API endpoints, including request parameters, response data, and response codes. The file is generated
     * dynamically based on the API documentation provided in the code base.",
     *         @OA\JsonContent(
     *             type="object"
     *         )
     *     )
     * )
     */
    $app->get('/openapi.json', function ($request, $response, $args) {
        $swagger = OpenApi\Generator::scan([__DIR__]);
        $response->getBody()->write(json_encode($swagger, JSON_PRETTY_PRINT));
        return $response->withHeader('Content-Type', 'application/json');
    });

// Collections
    /**
     * @OA\Get(
     *     path="/rift_info",
     *     summary="Generates Randomized Rift Details.",
     *     tags={"Collections", "Rifts"},
     *     @OA\Response(
     *         response=200,
     *         description="Returns a JSON object with Random Rift details",
     *         @OA\JsonContent(ref="#/components/schemas/RiftDetails")
     *     )
     * )
     */
    $app->get('/rift_info', \CoMAPI\Generate\Rift\Base::class);

    /**
     * @OA\Get(
     *     path="/npc",
     *     summary="Generate a single NPC with randomized name, gender, physical descriptions, and voice",
     *     tags={"Collections", "NPCs"},
     *     @OA\Response(
     *         response="200",
     *         description="NPC information",
     *         @OA\JsonContent(ref="#/components/schemas/NPC")
     *     )
     * )
     */
    $app->get('/npc', NPC::class);

    /**
     * @OA\Get(
     *     path="/full_case",
     *     summary="Get the full case details",
     *     description="Retrieve the full case details for a given person from the rift.",
     *     tags={"Rifts", "Collections"},
     *     @OA\Response(
     *         response="200",
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/CaseDetails")
     *     )
     * )
     */
    $app->get(pattern:'/full_case', callable: CoMAPI\Generate\Case\Full::class);

    /**
     * @OA\Get(
     *     path="/case",
     *     summary="Get the full case details",
     *     description="Generate a random Case Concept",
     *     tags={"Rifts", "Collections"},
     *     @OA\Response(
     *         response="200",
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/LimitedCaseDetails")
     *     )
     * )
     */
    $app->get(pattern:'/case', callable: CoMAPI\Generate\Case\Only::class);

// Generators
    /**
     * @OA\Get(
     *     path="/name/{type}/{gender}",
     *     summary="Generates a 'real world' name.",
     *     tags={"Generators"},
     *     @OA\Parameter(
     *         name="type",
     *         in="path",
     *         description=">
     Name Part:
     * `first` - Given Name
     * `last` - Surname only (gender is ignored.)
     * `full` - Full Name (Given name + Surname only)
     * `null` - Full Name, possibly also including Titles and Suffixes",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             default="full",
     *             nullable=true,
     *             enum={"full", "first", "last", null}
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="gender",
     *         in="path",
     *         description=">
    Gender:
     * `male` - Names typically belonging to males as well as a few neutral that are common among AMAB persons. (This works with 'first', 'full', and null.)
     * `female` - Names typically belonging to females as well as a few neutral that are common among AFAB persons. (This works with 'first', 'full', and null.)
     * `neutral` - Names frequently chosen for being gender-neutral. (Please note that this only works with 'full' or 'first'. Does not work with null.)
     * `null` - Currently, only Male and Female names are available at this time. This does include several names that might be considered gender neutral.",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             default="any",
     *             enum={"male", "female", "neutral", "any"}
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="A randomly generated name",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string", example="John Doe")
     *         )
     *     )
     * )
     */
    $app->get('/name/{type}/{gender}', \CommonRoutes\Generate\Name::class);

    /**
     * @OA\Get(
     *     path="/gender",
     *     summary="Generates a random gender",
     *     tags={"Generators"},
     *     @OA\Response(
     *         response="200",
     *         description="Random gender",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="gender",
     *                 type="string",
     *                 enum={
     *                     "Male",
     *                     "Female",
     *                     "Non-Binary",
     *                     "Genderqueer",
     *                     "Agender",
     *                     "Bigender",
     *                     "Androgynous",
     *                     "Intersex",
     *                     "Genderfluid",
     *                     "Neutrois",
     *                     "Pangender",
     *                     "Two-Spirit",
     *                     "Transgender"
     *                 }
     *              )
     *         )
     *     )
     * )
     */
    $app->get('/gender', \CommonRoutes\Generate\Gender::class);

    /**
     * @OA\Get(
     *     path="/voice/{laban}",
     *     summary="Generates a Vocal pattern, based on, but not limited to, Laban Style for voice acting.",
     *     tags={"Generators"},
     *     @OA\Parameter(
     *         name="laban",
     *         in="path",
     *         description="Indicates whether to generate a voice pattern based on Laban (true) or a comprehensive set (false).",
     *         required=true,
     *         @OA\Schema(
     *             type="boolean"
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Possible Voice Variations.",
     *         @OA\JsonContent(
     *             @OA\Property(property="base_voice", type="string", example="Thrusting - Heavy, Indirect, Sudden", description="A string containing the base voice pattern, consisting of 3 factors and/or a Laban style."),
     *             @OA\Property(property="add_ons", type="object",
     *                 @OA\Property(property="Air Source", type="string", example="Nasal"),
     *                 @OA\Property(property="Air Variant", type="string", example="Dry"),
     *                 @OA\Property(property="Age Variant", type="string", example="Child"),
     *                 @OA\Property(property="Body Size", type="string", example="Large"),
     *                 @OA\Property(property="Tempo", type="string", example="Slow"),
     *                 @OA\Property(property="Tone", type="string", example="Friendly"),
     *                 @OA\Property(property="Impairments", type="string", example="Mild")
     *             )
     *         )
     *     )
     * )
     */
    $app->get('/voice[/{laban}]', \CommonRoutes\Generate\Voice::class);

    /**
     * @OA\Get(
     *     path="/physical_description/{gender}",
     *     summary="Generates a physical description",
     *     tags={"Generators"},
     *     @OA\Parameter(
     *         name="gender",
     *         in="path",
     *         description="The gender for which to generate the physical description. (Currently irrelevant.)",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description=">
Physical description. The build descriptor should be roughly accurate for the calculated BMI.
* NB: Some of these descriptors may have different connotations and are not necessarily accurate or appropriate in all contexts.
It's important to use language thoughtfully and respectfully, and to avoid stigmatizing or derogatory terms.",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="age", type="string", example="27 years old"),
     *             @OA\Property(property="height", type="string", example="177 cm / 70 inches"),
     *             @OA\Property(property="weight", type="string", example="68 kg / 150 lbs"),
     *             @OA\Property(property="bmi", type="number", format="float", example=19.31),
     *             @OA\Property(property="build", type="string", example="athletic"),
     *             @OA\Property(property="skinTone", type="string", example="fair"),
     *             @OA\Property(property="hairColor", type="string", example="brown"),
     *             @OA\Property(property="eyeColor", type="string", example="brown"),
     *             @OA\Property(property="facialFeatures", type="string", example="scar on left cheek"),
     *             @OA\Property(property="noticeableMarkings", type="string", example="tattoo on right arm"),
     *             @OA\Property(property="clothingStyle", type="string", example="casual")
     *         )
     *     )
     * )
     */
    $app->get('/physical_description[/{gender}]', \CommonRoutes\Generate\PhysicalDescription::class);

    /**
     * @OA\Get(
     *     path="/occupation",
     *     summary="Generate a random occupation",
     *     tags={"Generators"},
     *     @OA\Response(
     *         response=200,
     *         description="Returns a JSON object with a random occupation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="occupation",
     *                 type="string",
     *                 description="The generated occupation"
     *             )
     *         )
     *     )
     * )
     */
    $app->get('/occupation', \CommonRoutes\Generate\Occupation::class);

    /**
     * @OA\Get(
     *     path="/rift/level",
     *     summary="Generates Randomized Rift Level (1-6).",
     *     tags={"Generators", "Rifts"},
     *     @OA\Response(
     *         response=200,
     *         description="Returns a JSON object specifying Rift Level",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="rift_strength",
     *                 type="string",
     *                 description="The generated level"
     *             )
     *         )
     *     )
     * )
     */
    $app->get('/rift/level', \CoMAPI\Generate\Rift\Level::class);

    /**
     * @OA\Get(
     *     path="/rift/logos",
     *     summary="Generates Randomized Rift Logos ('d66' method).",
     *     tags={"Generators", "Rifts"},
     *     @OA\Response(
     *         response=200,
     *         description="Returns a JSON object specifying Logos",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="logos",
     *                 type="string",
     *                 description="A Logos for your PC or NPC"
     *             )
     *         )
     *     )
     * )
     */
    $app->get('/rift/logos', \CoMAPI\Generate\Rift\Logos::class);

    /**
     * @OA\Get(
     *     path="/rift/logos/motivation",
     *     summary="Generates a Logos Motivation.",
     *     tags={"Generators", "Rifts"},
     *     @OA\Response(
     *         response=200,
     *         description="Returns a JSON object specifying Motivation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="logos_motivation",
     *                 type="string",
     *                 description="A Logos Motivation for your PC or NPC"
     *             )
     *         )
     *     )
     * )
     */
    $app->get('/rift/logos/motivation', \CoMAPI\Generate\Rift\LogosMotivation::class);

    /**
     * @OA\Get(
     *     path="/rift/mythos",
     *     summary="Generates Randomized Rift Mythos ('d66' method).",
     *     tags={"Generators", "Rifts"},
     *     @OA\Response(
     *         response=200,
     *         description="Returns a JSON object specifying Mythos",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="mythos",
     *                 type="string",
     *                 description="A Mythos for your PC or NPC"
     *             )
     *         )
     *     )
     * )
     */
    $app->get('/rift/mythos', \CoMAPI\Generate\Rift\Mythos::class);

    /**
     * @OA\Get(
     *     path="/rift/mythos/motivation",
     *     summary="Generates a Mythos Motivation.",
     *     tags={"Generators", "Rifts"},
     *     @OA\Response(
     *         response=200,
     *         description="Returns a JSON object specifying Motivation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="mythos_motivation",
     *                 type="string",
     *                 description="A Logos for your PC or NPC"
     *             )
     *         )
     *     )
     * )
     */
    $app->get('/rift/mythos/motivation', \CoMAPI\Generate\Rift\MythosMotivation::class);

    /**
     * @OA\Get(
     *     path="/rift/reason",
     *     summary="Randomly selects a reason for Awakening",
     *     tags={"Generators", "Rifts"},
     *     @OA\Response(
     *         response=200,
     *         description="Returns a JSON object specifying Awakening Reason",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="reason",
     *                 type="string",
     *                 description="How did the PC of NPC Awaken?"
     *             )
     *         )
     *     )
     * )
     */
    $app->get('/rift/reason', \CoMAPI\Generate\Rift\AwakeningReason::class);

    $app->get('/rift/mythos/theme', \CoMAPI\Generate\Rift\MythosTheme::class);
    $app->get('/rift/logos/theme', \CoMAPI\Generate\Rift\LogosTheme::class);






};

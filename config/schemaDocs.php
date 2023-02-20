<?php
// Schema
/**
 * @OA\Schema(
 *     schema="LogosTheme",
 *     type="object",
 *     @OA\Property(property="logos_type", type="string"),
 *     @OA\Property(property="possible_theme", type="string")
 * )
 */

/**
 * @OA\Schema(
 *     schema="MythosTheme",
 *     type="object",
 *     @OA\Property(property="mythos_type", type="string"),
 *     @OA\Property(property="mythos_suggestion", type="string")
 * )
 */

/**
 * @OA\Schema(
 *     schema="RiftDetails",
 *     type="object",
 *     @OA\Property(property="rift_strength", type="string"),
 *     @OA\Property(property="logos", type="string"),
 *     @OA\Property(property="logos_motivation", type="string"),
 *     @OA\Property(property="mythos_type", type="string"),
 *     @OA\Property(property="mythos_suggestion", type="string"),
 *     @OA\Property(property="mythos_motivation", type="string"),
 *     @OA\Property(property="awakening_reason", type="string"),
 *     @OA\Property(
 *         property="logos_themes",
 *         type="object",
 *         additionalProperties={"$ref": "#/components/schemas/LogosTheme"}
 *     ),
 *     @OA\Property(
 *         property="mythos_themes",
 *         type="object",
 *         additionalProperties={"$ref": "#/components/schemas/MythosTheme"}
 *     )
 * )
 */

/**
 * @OA\Schema(
 *     schema="PhysicalDescription",
 *     @OA\Property(property="age", type="string", example="27 years old"),
 *     @OA\Property(property="height", type="string", example="71 inches"),
 *     @OA\Property(property="weight", type="string", example="150 pounds"),
 *     @OA\Property(property="bmi", type="number", format="float", example=26.27),
 *     @OA\Property(property="build", type="string", example="athletic"),
 *     @OA\Property(property="skinTone", type="string", example="fair"),
 *     @OA\Property(property="hairColor", type="string", example="brown"),
 *     @OA\Property(property="eyeColor", type="string", example="brown"),
 *     @OA\Property(property="noticeableMarkings", type="string", example="Scar on temple"),
 *     @OA\Property(property="clothingStyle", type="string", example="Punk")
 * )
 */

/**
 * @OA\Schema(
 *     schema="VocalTips",
 *     @OA\Property(
 *         property="base_voice",
 *         type="string",
 *         example="Dabbing - Light, Direct, Sudden",
 *         description="A string containing the base voice pattern, consisting of 3 factors and/or a Laban style."
 *     ),
 *     @OA\Property(
 *         property="add_ons",
 *         type="object",
 *         @OA\Property(property="Air Source", type="string", example="Nasal"),
 *         @OA\Property(property="Air Variant", type="string", example="Dry"),
 *         @OA\Property(property="Age Variant", type="string", example="Child"),
 *         @OA\Property(property="Body Size", type="string", example="Large"),
 *         @OA\Property(property="Tempo", type="string", example="Slow"),
 *         @OA\Property(property="Tone", type="string", example="Friendly"),
 *         @OA\Property(property="Impairments", type="string", example="Mild")
 *     )
 * )
 */

/**
 * @OA\Schema(
 *     schema="NPC",
 *     @OA\Property(property="name", type="string", example="Alexandra"),
 *     @OA\Property(property="gender", type="string"),
 *     @OA\Property(property="rift_details", ref="#/components/schemas/RiftDetails"),
 *     @OA\Property(property="physicalDescription", ref="#/components/schemas/PhysicalDescription"),
 *     @OA\Property(property="vocal_tips", ref="#/components/schemas/VocalTips")
 * )
 */

/**
 * @OA\Schema(
 *     schema="CaseDetails",
 *     type="object",
 *     @OA\Property(property="rift_info", ref="#/components/schemas/NPC"),
 *     @OA\Property(property="case_details", ref="#/components/schemas/LimitedCaseDetails")
 * )
 */

/**
 * @OA\Schema(
 *     schema="LimitedCaseDetails",
 *     type="object",
 *     @OA\Property(property="case_details", type="object",
 *         @OA\Property(property="problem", type="string"),
 *         @OA\Property(property="rift_involvement", type="string"),
 *         @OA\Property(property="scope", type="string"),
 *         @OA\Property(property="theme", type="string"),
 *         @OA\Property(property="format", type="string"),
 *         @OA\Property(property="hook", type="string"),
 *         @OA\Property(property="timing", type="string"),
 *         @OA\Property(property="complication", type="string")
 *     )
 * )
 */
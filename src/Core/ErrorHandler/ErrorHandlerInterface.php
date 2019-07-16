<?php
declare(strict_types=1);
namespace TYPO3Fluid\Fluid\Core\ErrorHandler;

/*
 * This file belongs to the package "TYPO3 Fluid".
 * See LICENSE.txt that was shipped with this package.
 */

use TYPO3Fluid\Fluid\Core\Compiler\StopCompilingException;
use TYPO3Fluid\Fluid\Core\Parser\Exception;
use TYPO3Fluid\Fluid\Core\Parser\ExpressionException;

/**
 * Interface ErrorHandlerInterface
 */
interface ErrorHandlerInterface
{
    /**
     * Handle errors caused by parsing templates, for example when
     * invalid arguments are used.
     *
     * @param Exception $error
     * @return string
     */
    public function handleParserError(Exception $error): string;

    /**
     * Handle errors caused by invalid expressions, e.g. errors
     * raised from misuse of `{variable xyz 123}` style expressions,
     * such as the casting expression `{variable as type}`.
     *
     * @param ExpressionException $error
     * @return string
     */
    public function handleExpressionError(\TYPO3Fluid\Fluid\Core\Parser\SyntaxTree\Expression\ExpressionException $error): string;

    /**
     * Can be implemented to handle a ViewHelper errors which are
     * normally thrown from inside ViewHelpers during rendering.
     *
     * @param \TYPO3Fluid\Fluid\Core\ViewHelper\Exception $error
     * @return string
     */
    public function handleViewHelperError(\TYPO3Fluid\Fluid\Core\ViewHelper\Exception $error): string;

    /**
     * @param \TYPO3Fluid\Fluid\View\Exception $error
     * @return string
     */
    public function handleViewError(\TYPO3Fluid\Fluid\View\Exception $error): string;

}
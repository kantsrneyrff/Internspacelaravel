<?php
if (!function_exists('validarCPFCNPJ')) {
    function validarCPFCNPJ($documento)
    {
        // Remover caracteres não numéricos do documento
        $documento = preg_replace('/[^0-9]/', '', $documento);

        // Verificar se é CPF (11 dígitos)
        if (strlen($documento) === 11) {
            // Cálculo do primeiro dígito verificador do CPF
            $soma = 0;
            for ($i = 0; $i < 9; $i++) {
                $soma += (int) $documento[$i] * (10 - $i);
            }
            $resto = $soma % 11;
            $digitoVerificador1 = ($resto < 2) ? 0 : 11 - $resto;

            // Cálculo do segundo dígito verificador do CPF
            $soma = 0;
            for ($i = 0; $i < 10; $i++) {
                $soma += (int) $documento[$i] * (11 - $i);
            }
            $resto = $soma % 11;
            $digitoVerificador2 = ($resto < 2) ? 0 : 11 - $resto;

            // Verificar se os dígitos calculados são iguais aos dois últimos dígitos do CPF
            if ($documento[9] == $digitoVerificador1 && $documento[10] == $digitoVerificador2) {
                return true;
            }
        }

        // Verificar se é CNPJ (14 dígitos)
        elseif (strlen($documento) === 14) {
            // Cálculo do primeiro dígito verificador do CNPJ
            $soma = 0;
            $peso = 5;
            for ($i = 0; $i < 12; $i++) {
                $soma += (int) $documento[$i] * $peso;
                $peso = ($peso === 2) ? 9 : $peso - 1;
            }
            $resto = $soma % 11;
            $digitoVerificador1 = ($resto < 2) ? 0 : 11 - $resto;

            // Cálculo do segundo dígito verificador do CNPJ
            $soma = 0;
            $peso = 6;
            for ($i = 0; $i < 13; $i++) {
                $soma += (int) $documento[$i] * $peso;
                $peso = ($peso === 2) ? 9 : $peso - 1;
            }
            $resto = $soma % 11;
            $digitoVerificador2 = ($resto < 2) ? 0 : 11 - $resto;

            // Verificar se os dígitos calculados são iguais aos dois últimos dígitos do CNPJ
            if ($documento[12] == $digitoVerificador1 && $documento[13] == $digitoVerificador2) {
                return true;
            }
        }

        // Documento inválido
        return false;
    }
}